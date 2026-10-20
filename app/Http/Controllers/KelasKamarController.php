<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KelasKamarController extends Controller
{
    public function index()
    {
        try {
            $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

            $queryKelas = DB::table('ref_kelas')
            ->select('ref_kelas.employee_id', 'employee_new.nama AS nama_guru', 'ref_kelas.id AS id_kelas', 'ref_kelas.name')
            ->leftJoin('employee_new', 'ref_kelas.employee_id','=','employee_new.id')
            ->get();

            $queryKamar = DB::table('ref_kamar')
            ->select(
                'ref_kamar.*',
                'employee_new.nama AS guru_murroby'
            )
            ->orderByRaw("CAST(SUBSTRING_INDEX(code, 'a', 1) AS UNSIGNED) ASC, code ASC")
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->get();

            $data = [
                'dataKelas'  => $queryKelas,
                'dataKamar'  => $queryKamar
            ];

            return view('kelas-kamar.index', $data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showKelas($id)
    {
        try {
            $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

            $kelasData = DB::table('ref_kelas')
            ->leftJoin('employee_new', 'ref_kelas.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id)
            ->select(
                'employee_new.nama AS wali_kelas_nama',
                'employee_new.photo AS wali_kelas_photo',
                'ref_kelas.name AS nama_kelas'
            )
            ->first();

            $querySantriDetail = DB::table('santri_detail')
            ->select(
                'santri_detail.no_induk',
                'santri_detail.nama', 
                'santri_detail.photo AS fotoSantri', 
                'santri_detail.kelas', 
                'santri_detail.kecamatan', 
                'ref_kamar.employee_id AS kamar_employee_id', 
                'ref_kelas.employee_id AS kelas_employee_id', 
                'ref_kelas.code AS nama_kelas', 
                'employee_new.nama AS guru_murroby',
                'ref_tahfidz.name AS kelasTahfidz'
            )
            ->leftJoin('ref_kamar', 'santri_detail.kamar_id', '=', 'ref_kamar.id')
            ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
            ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
            ->leftJoin('santri_tahfidz', 'santri_detail.id', '=', 'santri_tahfidz.santri_id')
            ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
            ->where('ref_kelas.id', '=', $id)
            ->distinct();

            $jumlahIsi = $querySantriDetail->count();
            $query = $querySantriDetail->get();

            // Mengembalikan data dalam format JSON
            return view('kelas-kamar.detail-kelas', compact('query','kelasData','jumlahIsi'));

        } catch (\Exception $e) {
            // Mengembalikan pesan error jika terjadi exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showKamar($id)
    {

        $tahunAjaran = DB::table('ref_tahun_ajaran')->latest()->first();

        $dataKamar = DB::table('ref_kamar')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
        ->where('ref_kamar.id', '=', $id)
        ->select(
            'employee_new.nama AS nama_murroby',
            'employee_new.photo AS foto_murroby',
            'ref_kamar.name AS nama_kamar'
        )
        ->first();

        $queryKamar = DB::table('santri_kamar')
        ->select(
            'santri_kamar.*',
            'santri_detail.nama AS namaSantri', 
            'santri_detail.photo AS fotoSantri', 
            'santri_detail.kelas AS kelasSantri', 
            'santri_detail.kecamatan AS asalSantri',
            'ref_kelas.code AS nama_kelas',
            'employee_new.nama AS guru_murroby',
            'ref_kamar.employee_id AS kamar_employee_id',  // Alias to differentiate
            'ref_kelas.employee_id AS kelas_employee_id',
            'ref_tahfidz.name AS kelasTahfidz'
            )
        ->leftJoin('santri_detail', 'santri_kamar.santri_id', '=', 'santri_detail.id')
        ->leftJoin('ref_tahfidz', 'santri_detail.tahfidz_id', '=', 'ref_tahfidz.id')
        ->leftJoin('ref_kamar', 'santri_kamar.kamar_id', '=', 'ref_kamar.id')
        ->leftJoin('ref_kelas', 'santri_detail.kelas', '=', 'ref_kelas.code')
        ->leftJoin('employee_new', 'ref_kamar.employee_id', '=', 'employee_new.id')
        ->where('santri_kamar.kamar_id', $id)
        ->where('santri_kamar.status', 1)
        ->where('santri_kamar.tahun_ajaran_id', $tahunAjaran->id)
        ->distinct()
        ;

        $query = $queryKamar->get();

        $jumlahIsi = $queryKamar->count();
        
        return view('kelas-kamar.detail-kamar', compact('query','dataKamar','jumlahIsi'));
    }
}
