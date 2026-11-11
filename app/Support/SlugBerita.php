<?php

namespace App\Support;

use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

/**
 * Slug publik berita. Kolom `slug` di database tidak unik (ada artikel berjudul sama), jadi artikel
 * tertua memakai slug apa adanya dan yang berikutnya diberi akhiran `--2`, `--3`, dst.
 * Urutan dihitung dari id semua baris (termasuk yang sudah dihapus) agar URL tidak bergeser.
 * Pemisah `--` dipakai karena tidak pernah muncul di slug asli, jadi tidak bisa bentrok.
 */
class SlugBerita
{
    /** Kolom tambahan untuk SELECT: jumlah baris lain dengan slug sama yang lebih tua. */
    public static function urutan(): Expression
    {
        return DB::raw('(SELECT COUNT(*) FROM berita AS b2 WHERE b2.slug = berita.slug AND b2.id < berita.id) AS urutan_slug');
    }

    /** Slug untuk URL dari baris yang memuat `slug` dan `urutan_slug`. */
    public static function publik(object $berita): string
    {
        $urutan = (int) $berita->urutan_slug;

        return $urutan === 0 ? $berita->slug : $berita->slug . '--' . ($urutan + 1);
    }

    /** Pecah slug URL menjadi [slug asli, urutan mulai 0]. */
    public static function pecah(string $slugPublik): array
    {
        if (preg_match('/^(.+)--(\d+)$/', $slugPublik, $cocok) && (int) $cocok[2] >= 2) {
            return [$cocok[1], (int) $cocok[2] - 1];
        }

        return [$slugPublik, 0];
    }
}
