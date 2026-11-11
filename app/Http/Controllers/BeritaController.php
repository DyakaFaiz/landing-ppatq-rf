<?php

namespace App\Http\Controllers;

use App\Support\SlugBerita;
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

            $item = Cache::remember("berita.v2.halaman.$halaman", self::CACHE_TTL, fn () => DB::table('berita')
                ->select('id', 'judul', 'slug', 'created_at', 'thumbnail', 'isi_berita', SlugBerita::urutan())
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->forPage($halaman, self::PER_HALAMAN)
                ->get());

            $data = (new LengthAwarePaginator(
                $item->map(fn ($berita) => $this->denganSlug($berita)),
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

    public function detail($slug)
    {
        [$slugAsli, $urutan] = SlugBerita::pecah($slug);

        $berita = $this->cariBerita($slugAsli, $urutan);

        if (!$berita) {
            // Tautan lama memakai id terenkripsi: arahkan permanen ke URL slug
            $lama = $this->cariBeritaLama($slug);
            abort_if(!$lama, 404);

            return redirect()->route('berita.detail', ['slug' => SlugBerita::publik($lama)], 301);
        }

        $berita->slug_publik = SlugBerita::publik($berita);

        // URL tidak sama dengan bentuk bakunya (mis. huruf besar): arahkan ke yang baku
        if ($slug !== $berita->slug_publik && $slug !== rawurldecode($berita->slug_publik)) {
            return redirect()->route('berita.detail', ['slug' => $berita->slug_publik], 301);
        }

        // Daftar berita terbaru dipakai bersama semua halaman detail, jadi cukup satu query yang di-cache
        $terbaru = Cache::remember('berita.v2.terbaru', self::CACHE_TTL, fn () => DB::table('berita')
            ->select('id', 'judul', 'slug', 'thumbnail', 'isi_berita', SlugBerita::urutan())
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get());

        $dataList = $terbaru
            ->reject(fn ($item) => (int) $item->id === (int) $berita->id)
            ->take(4)
            ->map(fn ($item) => $this->denganSlug($item))
            ->values();

        ['sebelumnya' => $sebelumnya, 'berikutnya' => $berikutnya, 'terkait' => $terkait] = $this->navigasi($berita);

        return view('berita.detail', compact('berita', 'dataList', 'sebelumnya', 'berikutnya', 'terkait'));
    }

    /**
     * Artikel sebelumnya (lebih lama), berikutnya (lebih baru), dan berita sekategori.
     * Satu paket di-cache per artikel supaya tidak menambah query tiap dibuka.
     */
    private function navigasi(object $berita): array
    {
        $paket = Cache::remember("berita.v2.navigasi.{$berita->id}", self::CACHE_TTL, function () use ($berita) {
            $kolom = ['id', 'judul', 'slug', 'thumbnail', 'created_at', SlugBerita::urutan()];

            $sebelumnya = DB::table('berita')->select($kolom)
                ->whereNull('deleted_at')
                ->where(fn ($q) => $q->where('created_at', '<', $berita->created_at)
                    ->orWhere(fn ($q) => $q->where('created_at', $berita->created_at)->where('id', '<', $berita->id)))
                ->orderByDesc('created_at')->orderByDesc('id')
                ->first();

            $berikutnya = DB::table('berita')->select($kolom)
                ->whereNull('deleted_at')
                ->where(fn ($q) => $q->where('created_at', '>', $berita->created_at)
                    ->orWhere(fn ($q) => $q->where('created_at', $berita->created_at)->where('id', '>', $berita->id)))
                ->orderBy('created_at')->orderBy('id')
                ->first();

            $terkait = $berita->kategori_id
                ? DB::table('berita')->select($kolom)
                    ->whereNull('deleted_at')
                    ->where('kategori_id', $berita->kategori_id)
                    ->where('id', '!=', $berita->id)
                    ->orderByDesc('created_at')
                    ->limit(3)
                    ->get()
                : collect();

            return compact('sebelumnya', 'berikutnya', 'terkait');
        });

        return [
            'sebelumnya' => $paket['sebelumnya'] ? $this->denganSlug($paket['sebelumnya']) : null,
            'berikutnya' => $paket['berikutnya'] ? $this->denganSlug($paket['berikutnya']) : null,
            'terkait' => $paket['terkait']->map(fn ($item) => $this->denganSlug($item))->values(),
        ];
    }

    private function denganSlug(object $berita): object
    {
        $berita = clone $berita;
        $berita->slug_publik = SlugBerita::publik($berita);

        return $berita;
    }

    /** Berita aktif dengan slug asli dan urutan tertentu (urutan 0 = artikel tertua dengan slug itu). */
    private function cariBerita(string $slug, int $urutan): ?object
    {
        $berita = DB::table('berita')
            ->select('berita.id', 'berita.kategori_id', 'berita.thumbnail', 'berita.judul', 'berita.slug', 'berita.created_at', 'berita.isi_berita', 'berita.deleted_at', 'users.name AS nama_user', 'kategori_berita.nama_kategori AS nama_kategori', SlugBerita::urutan())
            ->leftJoin('users', 'berita.user_id', '=', 'users.id')
            ->leftJoin('kategori_berita', 'berita.kategori_id', '=', 'kategori_berita.id')
            // Satu slug lama berisi teks "%f0%9d..." harfiah, sedangkan browser mengirimnya sebagai karakter Unicode
            ->whereIn('berita.slug', array_unique([$slug, strtolower(rawurlencode($slug))]))
            ->get()
            ->first(fn ($item) => (int) $item->urutan_slug === $urutan);

        return $berita && $berita->deleted_at === null ? $berita : null;
    }

    private function cariBeritaLama(string $idEnkripsi): ?object
    {
        try {
            $id = (int) str_replace('ppatq', '', Crypt::decryptString($idEnkripsi));
        } catch (DecryptException $e) {
            return null;
        }

        return DB::table('berita')
            ->select('id', 'slug', SlugBerita::urutan())
            ->where('id', $id)
            ->whereNull('deleted_at')
            ->first();
    }
}
