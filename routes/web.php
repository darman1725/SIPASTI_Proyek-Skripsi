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
use App\Http\Controllers\Menu\PendaftaranController;
use App\Http\Controllers\Management\DataPenilaianController;
use App\Http\Controllers\Management\DataHasilAkhirController;
use App\Http\Controllers\Information\UserController;
use App\Http\Controllers\Information\DataProfileController;
use App\Http\Controllers\NotFoundController;

Auth::routes([
    'register' => true,
]);

Route::get('/', [LandingPageController::class, 'index']);

Route::resource('data_kriteria', DataKriteriaController::class);
Route::resource('data_sub_kriteria', DataSubKriteriaController::class);
Route::resource('data_alternatif', DataAlternatifController::class);
Route::resource('kegiatan', DataKegiatanController::class);
Route::resource('pendaftaran', PendaftaranController::class);

Route::group(['namespace' => 'App\Http\Controllers\Menu', 'prefix' => 'menu'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard_user', 'DashboardUserController@index')->name('dashboard_user');
    Route::get('kegiatan', 'DataKegiatanController@index')->name('kegiatan');
    Route::get('pendaftaran', 'PendaftaranController@index')->name('pendaftaran');
    Route::get('data_kriteria', 'DataKriteriaController@index')->name('data_kriteria');
    Route::get('data_sub_kriteria', 'DataSubKriteriaController@index')->name('data_sub_kriteria');
    Route::get('data_alternatif', 'DataAlternatifController@index')->name('data_alternatif');
});

Route::post('/tambah_penilaian', [DataPenilaianController::class, 'tambah_penilaian'])->name('data_penilaian.tambah_penilaian');
Route::post('/update_penilaian', [DataPenilaianController::class, 'update_penilaian'])->name('data_penilaian.update_penilaian');
Route::get('/generate_pdf', [DataHasilAkhirController::class, 'generatePDF'])->name('generate_pdf');

Route::group(['namespace' => 'App\Http\Controllers\Management', 'prefix' => 'management'], function () {
    Route::get('data_penilaian', 'DataPenilaianController@index')->name('data_penilaian');
    Route::get('data_perhitungan', 'DataPerhitunganController@index')->name('data_perhitungan');
    Route::get('data_hasil_akhir', 'DataHasilAkhirController@index')->name('data_hasil_akhir');
});

Route::resource('user', UserController::class);

Route::group(['namespace' => 'App\Http\Controllers\Information', 'prefix' => 'information'], function () {
    Route::get('user', 'UserController@index')->name('user');
    Route::get('data_profile', 'DataProfileController@index')->name('data_profile');
});

Route::get('/profile/edit', [DataProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [DataProfileController::class, 'update'])->name('profile.update');

// Step 1
Route::post('/profile/step1', [DataProfileController::class, 'step1'])->name('profile.step1');
// Step 2
Route::post('/profile/step2', [DataProfileController::class, 'step2'])->name('profile.step2');
// Step 3
Route::post('/profile/step3', [DataProfileController::class, 'step3'])->name('profile.step3');

Route::fallback([NotFoundController::class, 'index']);