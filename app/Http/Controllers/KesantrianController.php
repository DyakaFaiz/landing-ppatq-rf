<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KesantrianController extends Controller
{
    private const PER_PAGE = 12;

    private function calonSantriQuery()
    {
        return DB::table('psb_peserta_online')
            ->select(
                'psb_peserta_online.nik',
                'psb_peserta_online.nama',
                'psb_peserta_online.jenis_kelamin',
                'psb_gelombang.nama_gel AS namaGelombang'
            )
            ->leftJoin('psb_gelombang', 'psb_peserta_online.gelombang_id', '=', 'psb_gelombang.id')
            ->distinct()
            ->inRandomOrder();
    }

    private function santriAktifQuery()
    {
        return DB::table('santri_detail')
            ->select(
                'santri_detail.id',
                'santri_detail.no_induk',
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'santri_detail.kecamatan',
                'ref_kamar.employee_id AS kamar_employee_id',
                'ref_kelas.employee_id AS kelas_employee_id',
                'guru_murroby.nama AS guru_murroby',
                'wali_kelas.nama AS wali_kelas',
                DB::raw('(
                    SELECT kj.nama 
                    FROM detail_santri_tahfidz dst
                    JOIN kode_juz kj ON kj.id = dst.kode_juz_surah
                    WHERE dst.no_induk = santri_detail.no_induk
                      AND dst.deleted_at IS NULL
                    ORDER BY dst.tanggal DESC, dst.id DESC
                    LIMIT 1
                ) AS capaian_juz')
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->whereNull('santri_detail.deleted_at')
            ->orderBy('santri_detail.nama', 'asc');
    }

    private function alumniQuery()
    {
        return DB::table('tb_alumni_santri_detail AS tbAlumni')
            ->select(
                'tbAlumni.*',
                DB::raw("CONCAT(SUBSTRING(tbAlumni.no_hp, 1, 8), '****') AS no_hp"),
                'ref_kamar.employee_id AS kamar_employee_id',
                'ref_kelas.employee_id AS kelas_employee_id',
                'guru_murroby.nama AS guru_murroby',
                'wali_kelas.nama AS wali_kelas',
                'tb_alumni.angkatan as angkatan',
                DB::raw('(
                    SELECT kj.nama 
                    FROM detail_santri_tahfidz dst
                    JOIN kode_juz kj ON kj.id = dst.kode_juz_surah
                    WHERE dst.no_induk = tbAlumni.no_induk
                      AND dst.deleted_at IS NULL
                    ORDER BY dst.tanggal DESC, dst.id DESC
                    LIMIT 1
                ) AS capaian_juz')
            )
            ->leftJoin('tb_alumni', 'tbAlumni.no_induk', '=', 'tb_alumni.no_induk')
            ->leftJoin('ref_kamar', 'tbAlumni.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'tbAlumni.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->orderBy('tbAlumni.nama', 'asc');
    }

    /**
     * Query data Alumni Khotimin:
     * Mengambil dari tabel resmi tbl_khotimin.
     * Berelasi dengan santri_detail jika santri aktif (tipe_santri = 'santri')
     * maupun tb_alumni_santri_detail jika santri tidak aktif / alumni (tipe_santri = 'alumni').
     */
    private function khotiminQuery()
    {
        $baseQuery = DB::table('tbl_khotimin')
            ->leftJoin('santri_detail', function ($join) {
                $join->on('tbl_khotimin.santri_id', '=', 'santri_detail.id')
                     ->orOn('tbl_khotimin.kode_santri', '=', 'santri_detail.no_induk');
            })
            ->leftJoin('tb_alumni_santri_detail', 'tbl_khotimin.kode_santri', '=', 'tb_alumni_santri_detail.no_induk')
            ->select([
                DB::raw("COALESCE(santri_detail.nama, tb_alumni_santri_detail.nama, 'Santri') AS nama"),
                DB::raw("COALESCE(santri_detail.no_induk, tb_alumni_santri_detail.no_induk, tbl_khotimin.kode_santri) AS no_induk"),
                DB::raw("COALESCE(santri_detail.photo, tb_alumni_santri_detail.photo) AS photo"),
                DB::raw("COALESCE(tbl_khotimin.kelas, santri_detail.kelas, tb_alumni_santri_detail.kelas) AS kelas"),
                DB::raw("COALESCE(santri_detail.kecamatan, tb_alumni_santri_detail.kecamatan) AS kecamatan"),
                'tbl_khotimin.tanggal_khatam AS tanggal_khatam',
                'tbl_khotimin.keterangan AS keterangan',
                DB::raw("CASE 
                    WHEN tbl_khotimin.tipe_santri = 'santri' OR (santri_detail.id IS NOT NULL AND (santri_detail.status = 0 OR santri_detail.status IS NULL) AND santri_detail.deleted_at IS NULL) THEN 'Santri Aktif'
                    ELSE 'Alumni'
                END AS status_tipe"),
                DB::raw("COALESCE(YEAR(tbl_khotimin.tanggal_khatam), tb_alumni_santri_detail.khotmil_quran, tb_alumni_santri_detail.tahun_lulus) AS tahun_info")
            ]);

        return DB::query()->fromSub($baseQuery, 'khotimin_combined')->orderBy('nama', 'asc');
    }

    public function index(Request $request)
    {
        $validTabs = ['santri-aktif', 'alumni', 'khotimin'];
        $activeTab = $request->query('tab', 'santri-aktif');
        if (!in_array($activeTab, $validTabs, true)) {
            $activeTab = 'santri-aktif';
        }

        $data = [
            'activeTab'      => $activeTab,
            'santriAktif'    => $this->santriAktifQuery()->paginate(self::PER_PAGE, ['*'], 'page_santri')->withQueryString()->through(fn ($row) => $this->rapikanTeks($row)),
            'santriAlumni'   => $this->alumniQuery()->paginate(self::PER_PAGE, ['*'], 'page_alumni')->withQueryString()->through(fn ($row) => $this->rapikanTeks($row)),
            'santriKhotimin' => $this->khotiminQuery()->paginate(self::PER_PAGE, ['*'], 'page_khotimin')->withQueryString()->through(fn ($row) => $this->rapikanTeks($row)),
        ];

        return view('santri.index', $data);
    }

    public function get_santri(Request $request)
    {
        return $this->searchResponse($this->santriAktifQuery(), $request->input('search'), [
            'santri_detail.nama',
            'santri_detail.no_induk',
            'santri_detail.kelas',
            'santri_detail.kecamatan',
            'guru_murroby.nama',
            'wali_kelas.nama',
        ]);
    }

    public function get_alumni(Request $request)
    {
        return $this->searchResponse($this->alumniQuery(), $request->input('search'), [
            'tbAlumni.nama',
            'tbAlumni.no_induk',
            'tbAlumni.kelas',
            'tbAlumni.kecamatan',
            'tb_alumni.angkatan',
            'tbAlumni.tahun_lulus',
            'guru_murroby.nama',
            'wali_kelas.nama',
            'tbAlumni.no_hp',
        ]);
    }

    public function get_khotimin(Request $request)
    {
        return $this->searchResponse($this->khotiminQuery(), $request->input('search'), [
            'nama',
            'no_induk',
            'kelas',
            'status_tipe',
            'keterangan',
            'tahun_info',
            'kecamatan',
        ]);
    }

    public function get_calon_santri(Request $request)
    {
        return $this->searchResponse($this->calonSantriQuery(), $request->input('search'), [
            'psb_gelombang.nama_gel',
            'psb_peserta_online.nama',
            'psb_peserta_online.jenis_kelamin',
        ]);
    }

    /**
     * Rapikan teks yang tampil di card: spasi, huruf kapital nama, gelar, kelas, dan jenis kelamin.
     */
    private function rapikanTeks(object $row): object
    {
        foreach (['nama', 'guru_murroby', 'wali_kelas'] as $field) {
            if (isset($row->$field)) {
                $row->$field = $this->rapikanNama($row->$field);
            }
        }

        if (isset($row->kelas)) {
            $row->kelas = mb_strtoupper(trim($row->kelas));
        }

        if (isset($row->jenis_kelamin)) {
            $row->jenis_kelamin = match (strtoupper(trim($row->jenis_kelamin))) {
                'L'     => 'Laki-laki',
                'P'     => 'Perempuan',
                default => trim($row->jenis_kelamin),
            };
        }

        if (isset($row->tanggal_khatam) && !empty($row->tanggal_khatam)) {
            try {
                $row->tanggal_khatam_formatted = \Carbon\Carbon::parse($row->tanggal_khatam)->translatedFormat('d F Y');
            } catch (\Throwable $e) {
                $row->tanggal_khatam_formatted = $row->tanggal_khatam;
            }
        } else {
            $row->tanggal_khatam_formatted = null;
        }

        if (!isset($row->capaian_juz) || empty(trim((string)$row->capaian_juz))) {
            $row->capaian_juz = '-';
        }

        return $row;
    }

    /**
     * "MUhammad  fatikhul amin, S. Pd" => "Muhammad Fatikhul Amin, S.Pd"
     * Huruf kapital hanya diubah pada bagian nama; gelar setelah koma dipertahankan.
     */
    private function rapikanNama(string $nama): string
    {
        $nama = trim(preg_replace('/\s+/u', ' ', $nama));
        [$namaDepan, $gelar] = array_pad(explode(',', $nama, 2), 2, null);

        $hasil = mb_convert_case(trim($namaDepan), MB_CASE_TITLE, 'UTF-8');

        if ($gelar !== null && trim($gelar) !== '') {
            $hasil .= ', ' . preg_replace('/\.\s+(?=\p{L})/u', '.', trim($gelar));
        }

        return $hasil;
    }

    /**
     * Cari $search di salah satu kolom $columns (LIKE), lalu kembalikan hasilnya sebagai JSON terpaginasi.
     */
    private function searchResponse($query, ?string $search, array $columns)
    {
        try {
            if (!empty($search)) {
                $query->where(function ($subQuery) use ($search, $columns) {
                    foreach ($columns as $column) {
                        $subQuery->orWhere($column, 'like', '%' . $search . '%');
                    }
                });
            }

            return response()->json(
                $query->paginate(self::PER_PAGE)->through(fn ($row) => $this->rapikanTeks($row))
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
