<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/daftar', function () {
    return view('auth.register');
})->name('daftar');

Route::post('/daftar/simpan',  [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('simpan-daftar');


Route::get('/restricted', [App\Http\Controllers\HomeController::class, 'restricted'])->middleware(['role']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', function () {
//     return view('admin/dashboard');
// });

Route::group(['middleware' => 'auth','isAdmin:administrator'],function(){

Route::get('/dashboard', 'ControllerDataAset@index');

Route::get('/ManajemenAset/DataAset', 'ControllerDataAset@index');

Route::get('/ManajemenAset/DataAset/Tambah', 'ControllerDataAset@create');

Route::post('/ManajemenAset/DataAset/Simpan', 'ControllerDataAset@store');

Route::get('/ManajemenAset/DataAset/Ubah/{id}', 'ControllerDataAset@edit');

Route::post('/ManajemenAset/DataAset/Kirim/{id}', 'ControllerDataAset@update');

Route::get('/ManajemenAset/DataAset/Hapus/{id}', 'ControllerDataAset@destroy');


Route::get('/ManajemenAset/PeminjamanAset', 'PeminjamanController@indexPeminjaman');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Setujui/{id}', 'PeminjamanController@statusSetuju');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Tolak/{id}', 'PeminjamanController@statusTolak');


});


Route::group(['middleware' => 'auth','isAdmin:visitor'],function(){

Route::get('/visitor/dashboard', 'PeminjamanController@index')->name('visitor-dashboard');

Route::get('/visitor/PermohonanAset/PeminjamanAset', 'PeminjamanController@create')->name('visitor-peminjaman');

Route::post('/visitor/PermohonanAset/PeminjamanAset/Simpan', 'PeminjamanController@store');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Ubah/{id}', 'PeminjamanController@edit');

Route::post('/visitor/PermohonanAset/PeminjamanAset/Kirim/{id}', 'PeminjamanController@update');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroy');




Route::get('/visitor/PermohonanAset/PengadaanAset', 'PengadaanController@create')->name('visitor-pengadaan');

Route::post('/visitor/PermohonanAset/PengadaanAset/Simpan', 'PengadaanController@store');

Route::get('/visitor/PermohonanAset/PengadaanAset/Ubah/{id}', 'PengadaanController@edit');

Route::post('/visitor/PermohonanAset/PengadaanAset/Kirim/{id}', 'PengadaanController@update');

Route::get('/visitor/PermohonanAset/PengadaanAset/Hapus/{id}', 'PengadaanController@destroy');

});

