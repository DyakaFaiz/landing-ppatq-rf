<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GaleriFasilitasController extends Controller
{
    public function index(){
        // Query-nya disimpan sementara; urutan acak dilakukan di PHP agar tetap berganti tiap kunjungan
        $data = [
            'galeri' => Cache::remember('galeri.semua', 600, fn () => DB::table('galeri')
                ->select('nama', 'foto')
                ->get())->shuffle(),
            'fasilitas' => Cache::remember('fasilitas.semua', 600, fn () => DB::table('fasilitas')
                ->select('nama', 'deskripsi', 'foto')
                ->get())->shuffle(),
        ];

        return view('galeri-fasilitas.index', $data);
    }
}
