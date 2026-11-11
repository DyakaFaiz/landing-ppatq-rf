<?php

use Illuminate\Support\Facades\Route;


$controller_path = 'App\Http\Controllers';


Route::get('/', $controller_path .'\HomePageController@index')->name('HomePage');

Route::get('/sitemap.xml', $controller_path .'\SeoController@sitemap')->name('sitemap');
Route::get('/robots.txt', $controller_path .'\SeoController@robots')->name('robots');
Route::get('/santri-random', $controller_path .'\HomePageController@getSantriRandom')->name('santriRandom');
Route::get('/pegawai-random', $controller_path .'\HomePageController@getPegawaiRandom')->name('pegawaiRandom');
Route::get('/about', $controller_path .'\HomePageController@About')->name('aboutPage');
Route::get('/visi-misi', $controller_path .'\HomePageController@visimisi')->name('visimisi');
Route::get('/sekapur-sirih', $controller_path .'\HomePageController@sekapursirih')->name('sekapursirih');

Route::get('/prestasi', $controller_path .'\PrestasiController@index')->name('prestasi');

Route::get('/kesantrian', $controller_path .'\KesantrianController@index')->name('kesantrian');
Route::post('/get_santri', $controller_path .'\KesantrianController@get_santri')->name('get_santri');
Route::post('/get_alumni', $controller_path .'\KesantrianController@get_alumni')->name('get_alumni');
Route::post('/get_calon_santri', $controller_path .'\KesantrianController@get_calon_santri')->name('get_calon_santri');

Route::get('/galeri-fasilitas', $controller_path .'\GaleriFasilitasController@index')->name('galeri-fasilitas');

Route::get('/berita', $controller_path .'\BeritaController@index')->name('berita');

Route::get('/agenda', $controller_path .'\AgendaController@index')->name('agenda');
Route::get('/berita/{slug}', $controller_path .'\BeritaController@detail')->name('berita.detail');

Route::get('/dakwah/{idDakwah}', $controller_path .'\DakwahController@detail')->name('dakwah.detail');

Route::get('/kelas-kamar', $controller_path .'\KelasKamarController@index')->name('kelas-kamar');
Route::get('/kelas/{id}', $controller_path .'\KelasKamarController@showKelas')->name('show-kelas');
Route::get('/kamar/{id}', $controller_path .'\KelasKamarController@showKamar')->name('show-kamar');

Route::get('/pengasuh-staff', $controller_path .'\PengasuhStaffController@index')->name('pengasuh-staff');
Route::post('/get_ustad', $controller_path .'\PengasuhStaffController@get_ustad')->name('get_ustad');
Route::post('/get_murroby', $controller_path .'\PengasuhStaffController@get_murroby')->name('get_murroby');
Route::post('/get_staff', $controller_path .'\PengasuhStaffController@get_staff')->name('get_staff');

Route::get('/layanan', $controller_path .'\LayananController@index')->name('layanan');

Route::get('/app-wali-santri', $controller_path .'\NewsController@indexAppWaliSantri')->name('app-wali-santri');

Route::get('/privacy-policy', function () {
    return view('privacy-policy.index');
})->name('privacy-policy');

Route::get('/cek-santri', $controller_path .'\CekSantriController@index')->name('cek-santri.index');
Route::post('/cek-santri', $controller_path .'\CekSantriController@submit')->name('cek-santri.submit');