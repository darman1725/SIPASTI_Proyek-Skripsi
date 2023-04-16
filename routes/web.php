<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Menu\DataKriteriaController;
use App\Http\Controllers\Menu\DataSubKriteriaController;
use App\Http\Controllers\Menu\DataAlternatifController;
use App\Http\Controllers\Menu\KegiatanController;
use App\Http\Controllers\Management\DataPenilaianController;
use App\Http\Controllers\Management\DataHasilAkhirController;
// use App\Http\Controllers\UserController;

Auth::routes([
    'register' => true,
]);

Route::resource('data_kriteria', DataKriteriaController::class);
Route::resource('data_sub_kriteria', DataSubKriteriaController::class);
Route::resource('data_alternatif', DataAlternatifController::class);
Route::resource('kegiatan', KegiatanController::class);

Route::group(['namespace' => 'App\Http\Controllers\Menu', 'prefix' => 'menu'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('kegiatan', 'KegiatanController@index')->name('kegiatan');
    Route::get('data_kriteria', 'DataKriteriaController@index')->name('data_kriteria');
    Route::get('data_sub_kriteria', 'DataSubKriteriaController@index')->name('data_sub_kriteria');
    Route::get('data_alternatif', 'DataAlternatifController@index')->name('data_alternatif');
});

// Route::group(['namespace' => 'App\Http\Controllers\Menu', 'prefix' => 'menu'], function () {
//     Route::resource('kegiatan', 'App\Http\Controllers\Menu\KegiatanController');
// });


Route::post('/tambah_penilaian', [DataPenilaianController::class, 'tambah_penilaian'])->name('data_penilaian.tambah_penilaian');
Route::post('/update_penilaian', [DataPenilaianController::class, 'update_penilaian'])->name('data_penilaian.update_penilaian');
Route::get('/generate_pdf', [DataHasilAkhirController::class, 'generatePDF'])->name('generate_pdf');

Route::group(['namespace' => 'App\Http\Controllers\Management', 'prefix' => 'management'], function () {
    Route::get('data_penilaian', 'DataPenilaianController@index')->name('data_penilaian');
    Route::get('data_perhitungan', 'DataPerhitunganController@index')->name('data_perhitungan');
    Route::get('data_hasil_akhir', 'DataHasilAkhirController@index')->name('data_hasil_akhir');
});


Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin'], function () {

    /*
    *
    *  Dashboard Routes
    *
    * ---------------------------------------------------------------------
    */
    // Route::get('dashboard', 'HomeController@index')->name('dashboard');

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::resource('users', UserController::class);
    Route::get('user/trash', 'UserController@trash')->name('users.trash');
    Route::post('user/{id}/restore', 'UserController@restore')->name('users.restore');
    Route::delete('user/force/{id}', 'UserController@deletePermanent')->name('users.force');
    Route::put('users/status/{id}', 'UserController@status')->name('users.status');
    Route::get('users/password/{id}', 'UserController@password')->name('users.password');
    Route::put('users/passwordUpdate/{id}', 'UserController@passwordUpdate')->name('users.passwordUpdate');
    Route::get('profile/{user}', 'UserController@show')->name('profile');
    Route::get('profile/{id}/edit', 'UserController@profile')->name('profile.edit');
    Route::put('profile/{id}/update', 'UserController@profileUpdate')->name('profile.update');

    /*
    *
    *  Setting Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@store')->name('settings.store');

    /*
    *
    *  Category Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::group(['prefix' => 'article'], function () {
        Route::resource('category', CategoryController::class);
        Route::get('category-trash', 'CategoryController@trash')->name('category.trash');
        Route::post('category/{id}/restore', 'CategoryController@restore')->name('category.restore');
        Route::delete('category/force/{id}', 'CategoryController@deletePermanent')->name('category.force');
    });
    /*
    *
    *  Post Routes
    *
    * ---------------------------------------------------------------------
    */
    Route::resource('article/post', PostController::class);
    Route::get('article/post/trash', 'PostController@trash')->name('post.trash');
    Route::post('article/post/{id}/restore', 'PostController@restore')->name('post.restore');
    Route::delete('article/post/force/{id}', 'PostController@deletePermanent')->name('post.force');
});



/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
// Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
//     Route::get('/', 'HomeController@index');
// });

Route::get('/', [LandingPageController::class, 'index']);