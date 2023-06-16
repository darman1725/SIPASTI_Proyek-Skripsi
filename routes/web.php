<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Menu\DashboardController;
use App\Http\Controllers\Menu\DashboardUserController;
use App\Http\Controllers\Menu\DataKriteriaController;
use App\Http\Controllers\Menu\DataSubKriteriaController;
use App\Http\Controllers\Menu\DataAlternatifController;
use App\Http\Controllers\Menu\DataKegiatanController;
use App\Http\Controllers\Menu\BeritaController;
use App\Http\Controllers\Menu\PendaftaranController;
use App\Http\Controllers\Management\DataPenilaianController;
use App\Http\Controllers\Management\DataHasilAkhirController;
use App\Http\Controllers\Management\DataPerhitunganController;
use App\Http\Controllers\Information\UserController;
use App\Http\Controllers\Information\DataProfileController;

Auth::routes([
    'register' => true,
]);

Route::get('/', [LandingPageController::class, 'index']);

Route::resource('data_kriteria', DataKriteriaController::class);
Route::resource('data_sub_kriteria', DataSubKriteriaController::class);
Route::resource('data_alternatif', DataAlternatifController::class);
Route::resource('kegiatan', DataKegiatanController::class);
Route::resource('pendaftaran', PendaftaranController::class);
Route::resource('berita', BeritaController::class);

Route::group(['namespace' => 'App\Http\Controllers\Menu', 'prefix' => 'menu'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard_user', 'DashboardUserController@index')->name('dashboard_user');
    Route::get('kegiatan', 'DataKegiatanController@index')->name('kegiatan');
    Route::get('berita', 'BeritaController@index')->name('berita');
    Route::get('pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
    Route::get('data_kriteria', 'DataKriteriaController@index')->name('data_kriteria');
    Route::get('data_sub_kriteria', 'DataSubKriteriaController@index')->name('data_sub_kriteria');
    Route::get('data_alternatif', 'DataAlternatifController@index')->name('data_alternatif');
});

Route::post('/tambah_penilaian', [DataPenilaianController::class, 'tambah_penilaian'])->name('data_penilaian.tambah_penilaian');
Route::post('/update_penilaian', [DataPenilaianController::class, 'update_penilaian'])->name('data_penilaian.update_penilaian');
Route::delete('/hapus_penilaian/{pendaftaran}', [DataPenilaianController::class, 'hapus_penilaian'])->name('data_penilaian.hapus_penilaian');

Route::get('/data_perhitungan/filter', [DataPerhitunganController::class, 'filter'])->name('data_perhitungan.filter');
Route::post('/data-hasil-akhir/export-excel', [DataHasilAkhirController::class, 'exportExcel'])->name('data-hasil-akhir.export-excel');

Route::group(['namespace' => 'App\Http\Controllers\Management', 'prefix' => 'management'], function () {
    Route::get('data_penilaian', 'DataPenilaianController@index')->name('data_penilaian');
    Route::get('data_perhitungan', 'DataPerhitunganController@index')->name('data_perhitungan');
    Route::get('data_hasil_akhir', 'DataHasilAkhirController@index')->name('data_hasil_akhir');
});

Route::post('/generate-users', [UserController::class, 'generateUsers'])->name('generate.users');
Route::post('/user/import', [UserController::class, 'import'])->name('user.import');

Route::resource('user', UserController::class);
Route::delete('/users/bulk-delete', [UserController::class, 'bulkDelete'])->name('user.bulkDelete');

Route::get('/data_profile/edit', [DataProfileController::class, 'edit'])->name('data_profile.edit');
Route::match(['PUT', 'PATCH'], '/data_profile/update', [DataProfileController::class, 'update'])->name('data_profile.update');

Route::group(['namespace' => 'App\Http\Controllers\Information', 'prefix' => 'information'], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('data_profile', 'DataProfileController@index')->name('data_profile');
});


