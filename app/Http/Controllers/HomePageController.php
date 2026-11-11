<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class HomePageController extends Controller
{
    // Data yang jarang berubah disimpan sementara agar tidak bolak-balik ke database (tiap query ~40 ms)
    private const CACHE_TTL = 600;

    public function index()
    {
        try {
                $data['beritas'] = DB::table('berita')
                ->select('id', 'judul', 'created_at', 'thumbnail', 'isi_berita')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get()
                ->map(function ($item) {
                    $item->id = Crypt::encryptString($item->id . "ppatq");
                    return $item;
                });

                // Tanggal mulai selalu >= hari ini, jadi urut tanggal_mulai sama dengan jarak terdekat
                $data['agendas'] = DB::table('agenda')
                ->select('judul', 'isi', 'tanggal_mulai')
                ->whereNull('deleted_at')
                ->where('tanggal_mulai', '>=', DB::raw('CURDATE()'))
                ->orderBy('tanggal_mulai')
                ->limit(5)
                ->get();

                $statistik = Cache::remember('home.statistik', self::CACHE_TTL, function () {
                    $jumlahSantri = DB::table('santri_detail')
                    ->where('status', 0)
                    ->whereIn('jenis_kelamin', ['L', 'P'])
                    ->selectRaw('jenis_kelamin, COUNT(*) AS jumlah')
                    ->groupBy('jenis_kelamin')
                    ->pluck('jumlah', 'jenis_kelamin');

                    $jumlahGuru = DB::table('tb_guru')
                    ->whereIn('jabatan_new', ['murobby', 'ustadz', 'tahfidz'])
                    ->selectRaw("SUM(jabatan_new = 'murobby') AS murroby, COUNT(*) AS guru")
                    ->first();

                    return [
                        'laki'      => $jumlahSantri['L'] ?? 0,
                        'perempuan' => $jumlahSantri['P'] ?? 0,
                        'murroby'   => (int) $jumlahGuru->murroby,
                        'guru'      => (int) $jumlahGuru->guru,
                    ];
                });

                $data['jumlahSiswaLaki'] = $statistik['laki'];
                $data['jumlahSiswaPerempuan'] = $statistik['perempuan'];
                $data['jumlahMurroby'] = $statistik['murroby'];
                $data['jumlahGuru'] = $statistik['guru'];

                $data['fasilitas'] = Cache::remember('home.fasilitas', self::CACHE_TTL, fn () => DB::table('fasilitas')
                ->select('nama', 'foto')
                ->where('published', 1)
                ->get())->shuffle();

                $data['galeri'] = Cache::remember('home.galeri', self::CACHE_TTL, fn () => DB::table('galeri')
                ->select('nama', 'foto')
                ->where('published', 1)
                ->get())->shuffle();

                $data['dakwah'] = Cache::remember('home.dakwah', self::CACHE_TTL, fn () => DB::table('dakwah')
                    ->select('id', 'judul', 'isi_dakwah')
                    ->whereNull('deleted_at')
                    ->limit(4)
                    ->get())
                    ->map(function ($item) {
                        $item = clone $item;
                        $item->idEnkripsi = Crypt::encryptString($item->id . "ppatq");
                        return $item;
                    });

            return view('HomePage.index', $data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function getSantriRandom(){
        // Satu query untuk beberapa kandidat acak; tabelnya kecil jadi RAND() murah, yang mahal adalah round-trip
        $kandidat = DB::table('santri_detail')
            ->select('nama', 'photo', 'kelas')
            ->whereNotNull('photo')
            ->where('photo', '!=', '')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // Foto dicek langsung ke server manajemen, ambil kandidat pertama yang fotonya ada
        $santri = $kandidat->first(fn ($row) => $this->photoExists('https://manajemen.ppatq-rf.id/assets/img/upload/photo/' . $row->photo))
            ?? $kandidat->first();

        return response()->json($santri);
    }

    public function getPegawaiRandom(){
        $query = DB::table('employee_new')->select('nama', 'jabatan', 'photo');
        $total = Cache::remember('random.pegawai.total', self::CACHE_TTL, fn () => (clone $query)->count());

        return response()->json($total > 0 ? $this->rowAt($query, random_int(0, $total - 1)) : null);
    }

    /**
     * Ambil satu baris pada urutan ke-$offset, tanpa ORDER BY RAND() yang mengurutkan seluruh tabel.
     */
    private function rowAt($query, int $offset)
    {
        return $query->offset($offset)->limit(1)->first();
    }

    private function photoExists(string $url): bool
    {
        $context = stream_context_create(['http' => ['method' => 'HEAD', 'timeout' => 2]]);
        $headers = @get_headers($url, false, $context);

        return $headers !== false && str_contains($headers[0], '200');
    }
    
    public function About(){
        $data['about'] = Cache::remember('about', self::CACHE_TTL, fn () => DB::table('about')
        ->select('about.*')
        ->first());

        return view('About.index', $data);
    }
    public function visimisi(){
        return view('visimisi.index');
    }
    public function sekapursirih(){
        return view('sekapur_sirih.index');
    }
 
    
}
