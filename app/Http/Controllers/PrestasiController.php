<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

        $data["prestasi"]->transform(function ($item) use ($jenisOptions, $prestasiOptions, $tingkatOptions) {
            $item->jenis_text = $jenisOptions[$item->jenis] ?? $item->jenis;
            $item->prestasi_text = $prestasiOptions[$item->prestasi] ?? $item->prestasi;
            $item->tingkat_text = $tingkatOptions[$item->tingkat] ?? $item->tingkat;
            return $item;
        });

        return view("prestasi.index",  $data);
    }
}
