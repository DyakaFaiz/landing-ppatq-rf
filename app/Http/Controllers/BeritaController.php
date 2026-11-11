<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    // Berita baru perlu cepat muncul, jadi cache-nya pendek
    private const CACHE_TTL = 300;
    private const PER_HALAMAN = 6;

    public function index()
    {
        try {
            $halaman = max(1, (int) request()->query('page', 1));

            $total = Cache::remember('berita.total', self::CACHE_TTL, fn () => DB::table('berita')
                ->whereNull('deleted_at')
                ->count());

            // Halaman di luar jangkauan: 404, bukan halaman kosong yang bisa diindeks
            abort_if($halaman > max(1, (int) ceil($total / self::PER_HALAMAN)), 404);

            $item = Cache::remember("berita.halaman.$halaman", self::CACHE_TTL, fn () => DB::table('berita')
                ->select('id', 'judul', 'created_at', 'thumbnail', 'isi_berita')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->forPage($halaman, self::PER_HALAMAN)
                ->get());

            $data = (new LengthAwarePaginator(
                $item->map(function ($berita) {
                    $berita = clone $berita;
                    $berita->id = Crypt::encryptString($berita->id . "ppatq");
                    return $berita;
                }),
                $total,
                self::PER_HALAMAN,
                $halaman,
                ['path' => Paginator::resolveCurrentPath()]
            ))->withQueryString();

            return view('berita.index', compact('data'));
        } catch (\Symfony\Component\HttpKernel\Exception\HttpExceptionInterface $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function detail($idEnkripsi)
    {
        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
        } catch (DecryptException $e) {
            abort(404);
        }
        $id_berita = str_replace("ppatq", "", $idAsli);

        $berita = DB::table('berita')
            ->select('berita.id', 'berita.thumbnail', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.isi_berita', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori')
            ->leftJoin('users', 'berita.user_id', '=', 'users.id')
            ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
            ->where('berita.id', $id_berita)
            ->whereNull('berita.deleted_at')
            ->first();

        abort_if(!$berita, 404);

        // Daftar berita terbaru dipakai bersama semua halaman detail, jadi cukup satu query yang di-cache
        $terbaru = Cache::remember('berita.terbaru', self::CACHE_TTL, fn () => DB::table('berita')
            ->select('id', 'judul', 'thumbnail', 'isi_berita')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get());

        $dataList = $terbaru
            ->reject(fn ($item) => (int) $item->id === (int) $berita->id)
            ->take(4)
            ->map(function ($item) {
                $item = clone $item;
                $item->id = Crypt::encryptString($item->id . "ppatq");
                return $item;
            })
            ->values();

        return view('berita.detail', compact('berita', 'dataList'));
    }
}
