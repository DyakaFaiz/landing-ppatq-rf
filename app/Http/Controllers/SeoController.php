<?php

namespace App\Http\Controllers;

use App\Support\SlugBerita;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    // Halaman publik yang boleh diindeks: [nama route, changefreq, priority]
    private const HALAMAN = [
        ['HomePage', 'daily', '1.0'],
        ['berita', 'daily', '0.9'],
        ['agenda', 'weekly', '0.8'],
        ['aboutPage', 'monthly', '0.8'],
        ['visimisi', 'yearly', '0.6'],
        ['sekapursirih', 'yearly', '0.6'],
        ['galeri-fasilitas', 'weekly', '0.7'],
        ['pengasuh-staff', 'monthly', '0.7'],
        ['prestasi', 'monthly', '0.7'],
        ['kelas-kamar', 'monthly', '0.5'],
        ['layanan', 'monthly', '0.8'],
        ['app-wali-santri', 'monthly', '0.6'],
    ];

    public function sitemap()
    {
        // Semua berita aktif; daftar slug jarang berubah, jadi cukup di-cache satu jam
        $berita = Cache::remember('sitemap.berita', 3600, fn () => DB::table('berita')
            ->select('slug', 'created_at', 'updated_at', SlugBerita::urutan())
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn ($item) => (object) [
                'slug' => SlugBerita::publik($item),
                'diubah' => $item->updated_at ?: $item->created_at,
            ]));

        $xml = view('seo.sitemap', ['halaman' => self::HALAMAN, 'berita' => $berita])->render();

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function robots()
    {
        $baris = [
            'User-agent: *',
            'Allow: /',
            // Endpoint data (AJAX) tidak perlu dirayapi
            'Disallow: /get_santri',
            'Disallow: /get_alumni',
            'Disallow: /get_calon_santri',
            'Disallow: /get_ustad',
            'Disallow: /get_murroby',
            'Disallow: /get_staff',
            'Disallow: /santri-random',
            'Disallow: /pegawai-random',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
        ];

        return response(implode("\n", $baris) . "\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
