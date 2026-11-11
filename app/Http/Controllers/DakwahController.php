<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DakwahController extends Controller
{
    private const CACHE_TTL = 300;

    public function detail($idEnkripsi)
    {
        try {
            $idAsli = Crypt::decryptString($idEnkripsi);
        } catch (DecryptException $e) {
            abort(404);
        }
        $idDakwah = str_replace("ppatq", "", $idAsli);

        $data = DB::table('dakwah')
            ->where('dakwah.id', $idDakwah)
            ->whereNull('dakwah.deleted_at')
            ->first();

        abort_if(!$data, 404);

        $data->idEnkripsi = Crypt::encryptString($data->id . "ppatq");

        // Daftar dakwah terbaru dipakai bersama semua halaman detail, jadi cukup satu query yang di-cache
        $terbaru = Cache::remember('dakwah.terbaru', self::CACHE_TTL, fn () => DB::table('dakwah')
            ->select('id', 'judul', 'isi_dakwah')
            ->whereNull('deleted_at')
            ->latest()
            ->limit(5)
            ->get());

        $dataList = $terbaru
            ->reject(fn ($item) => (int) $item->id === (int) $data->id)
            ->take(4)
            ->map(function ($item) {
                $item = clone $item;
                $item->idEnkripsi = Crypt::encryptString($item->id . "ppatq");
                return $item;
            })
            ->values();

        return view('dakwah.detail', compact('data', 'dataList'));
    }
}
