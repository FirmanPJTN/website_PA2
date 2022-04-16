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
    return view('admin/dashboard');
});

Route::get('/ManajemenAset/DataAset', 'ControllerDataAset@index');

Route::get('/ManajemenAset/DataAset/Tambah', 'ControllerDataAset@create');

Route::post('/ManajemenAset/DataAset/Simpan', 'ControllerDataAset@store');

Route::get('/ManajemenAset/DataAset/Ubah/{id}', 'ControllerDataAset@edit');

Route::post('/ManajemenAset/DataAset/Kirim/{id}', 'ControllerDataAset@update');

Route::get('/ManajemenAset/DataAset/Hapus/{id}', 'ControllerDataAset@destroy');

Route::get('/ManajemenAset/DataAset/action', 'ControllerDataAset@action')->name('live_search.action');


Route::get('/visitor/dashboard', 'PeminjamanController@index');

Route::get('/visitor/PermohonanAset/PeminjamanAset', 'PeminjamanController@create');

Route::post('/visitor/PermohonanAset/PeminjamanAset/Simpan', 'PeminjamanController@store');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Ubah/{id}', 'PeminjamanController@edit');

Route::post('/visitor/PermohonanAset/PeminjamanAset/Kirim/{id}', 'PeminjamanController@update');

Route::get('/visitor/PermohonanAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroy');

