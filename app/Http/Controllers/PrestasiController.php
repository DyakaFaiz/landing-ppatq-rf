<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PrestasiController extends Controller
{
    public function index(){
        $data["prestasi"] = Cache::remember('prestasi.semua', 600, fn () => DB::table("prestasi")
        ->select(
            "prestasi.*",
            "santri_detail.nama AS namaSantri",
        )
        ->leftJoin("santri_detail", "santri_detail.no_induk", "=", "prestasi.no_induk")
        ->orderBy("created_at", "desc")
        ->get());

        $jenisOptions = [
            'olah-raga' => 'Olah raga',
            'seni-ketrampilan' => 'Seni / Ketrampilan',
            'science' => 'Science',
            'agama' => 'Agama',
            'matematik' => 'Matematik',
            'sosial' => 'Sosial',
            'umum' => 'Umum'
        ];

        $prestasiOptions = [
            'juara-i' => 'Juara I',
            'juara-ii' => 'Juara II',
            'juara-iii' => 'Juara III',
            'juara-umum' => 'Juara Umum',
            'juara-favorit' => 'Juara Favorit',
            'juara-harapan-i' => 'Juara Harapan I',
            'juara-harapan-ii' => 'Juara Harapan II'
        ];
        
        // Mapping tingkat
        $tingkatOptions = [
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
            'provinsi' => 'Provinsi',
            'nasional' => 'Nasional',
            'internasional' => 'Internasional'
        ];

        $baseUrl = 'https://manajemen.ppatq-rf.id/assets/img/upload/foto_prestasi/';
        $defaultImage = asset('img/default-prestasi.svg');

        $data["prestasi"]->transform(function ($item) use ($jenisOptions, $prestasiOptions, $tingkatOptions, $baseUrl, $defaultImage) {
            $item->jenis_text = $jenisOptions[$item->jenis] ?? $item->jenis;
            $item->prestasi_text = $prestasiOptions[$item->prestasi] ?? $item->prestasi;
            $item->tingkat_text = $tingkatOptions[$item->tingkat] ?? $item->tingkat;

            // Pengecekan ketersediaan gambar dari database dan remote server
            if (!empty($item->foto)) {
                $fotoUrl = $baseUrl . $item->foto;
                $exists = Cache::remember('prestasi.foto.' . md5($item->foto), 3600, function () use ($fotoUrl) {
                    try {
                        $response = Http::timeout(2)
                            ->withOptions(['allow_redirects' => false])
                            ->head($fotoUrl);
                        return $response->status() === 200;
                    } catch (\Throwable $e) {
                        return false;
                    }
                });

                if ($exists) {
                    $item->gambar_url = $fotoUrl;
                    $item->is_default_gambar = false;
                } else {
                    $item->gambar_url = $defaultImage;
                    $item->is_default_gambar = true;
                }
            } else {
                $item->gambar_url = $defaultImage;
                $item->is_default_gambar = true;
            }

            return $item;
        });

        $data['defaultImage'] = $defaultImage;

        return view("prestasi.index",  $data);
    }
}
