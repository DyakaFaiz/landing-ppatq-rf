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
                'santri_detail.nama',
                'santri_detail.photo',
                'santri_detail.kelas',
                'santri_detail.kecamatan',
                'ref_kamar.employee_id AS kamar_employee_id',
                'ref_kelas.employee_id AS kelas_employee_id',
                'guru_murroby.nama AS guru_murroby',
                'wali_kelas.nama AS wali_kelas'
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->inRandomOrder();
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
                'tb_alumni.angkatan as angkatan'
            )
            ->leftJoin('tb_alumni', 'tbAlumni.no_induk', '=', 'tb_alumni.no_induk')
            ->leftJoin('ref_kamar', 'tbAlumni.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'tbAlumni.kelas', '=', 'ref_kelas.code')
            ->leftJoin('employee_new AS guru_murroby', 'ref_kamar.employee_id', '=', 'guru_murroby.id')
            ->leftJoin('employee_new AS wali_kelas', 'ref_kelas.employee_id', '=', 'wali_kelas.id')
            ->inRandomOrder();
    }

    public function index()
    {
        // Daftar calon dan santri aktif tidak menampilkan link halaman, jadi tidak perlu COUNT(*)
        $data = [
            'santriAktif'  => $this->santriAktifQuery()->limit(6)->get()->map(fn ($row) => $this->rapikanTeks($row)),
            'santriAlumni' => $this->alumniQuery()->paginate(4)->through(fn ($row) => $this->rapikanTeks($row)),
            'santriCalon'  => $this->calonSantriQuery()->limit(4)->get()->map(fn ($row) => $this->rapikanTeks($row)),
        ];

        return view('santri.index', $data);
    }

    public function get_santri(Request $request)
    {
        return $this->searchResponse($this->santriAktifQuery(), $request->input('search'), [
            'santri_detail.nama',
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
            'tbAlumni.kelas',
            'tbAlumni.kecamatan',
            'guru_murroby.nama',
            'wali_kelas.nama',
            'tbAlumni.no_hp',
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
