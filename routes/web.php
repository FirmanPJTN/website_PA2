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


// ADMIN

Route::group(['middleware' => 'auth','isAdmin:administrator'],function(){

    Route::get('/admin', function () {
        return view('admin/dashboard');
    });


    // Manajemen Data Aset

    // Data Aset

    Route::get('/dashboard', 'ControllerDataAset@index')->name('dashboard');

    Route::get('/ManajemenAset/DataAset', 'ControllerDataAset@index');

    Route::get('/ManajemenAset/DataAset/Tambah', 'ControllerDataAset@create');

    Route::post('/ManajemenAset/DataAset/Simpan', 'ControllerDataAset@store');

    Route::get('/ManajemenAset/DataAset/Ubah/{id}', 'ControllerDataAset@edit');

    Route::post('/ManajemenAset/DataAset/Kirim/{id}', 'ControllerDataAset@update');

    Route::get('/ManajemenAset/DataAset/Hapus/{id}', 'ControllerDataAset@destroy');

    // Peminjaman Aset

    Route::get('/ManajemenAset/PeminjamanAset', 'PeminjamanController@indexPeminjaman');

    Route::get('/ManajemenAset/PengadaanAset', 'PengadaanController@indexPengadaan');


    Route::get('/visitor/PermohonanAset/PeminjamanAset/Setujui/{id}', 'PeminjamanController@statusSetuju');

    Route::get('/visitor/PermohonanAset/PeminjamanAset/Tolak/{id}', 'PeminjamanController@statusTolak');

    Route::get('/ManajemenAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroyAdmin');


    Route::get('/visitor/PermohonanAset/PengadaanAset/Setujui/{id}', 'PengadaanController@statusSetuju');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Tolak/{id}', 'PengadaanController@statusTolak');

    Route::get('/ManajemenAset/PengadaanAset/Hapus/{id}', 'PengadaanController@destroyAdmin');


    // MONITORING ASET

    // PERENCANAAN MONITORING
    Route::get('/MonitoringAset/PerencanaanMonitoring', 'MonitoringController@index')->name('perencanaan-monitoring');

    Route::get('/MonitoringAset/PerencanaanMonitoring/Tambah', 'MonitoringController@create')->name('tambah-perencanaan-monitoring');

    Route::post('/MonitoringAset/PerencanaanMonitoring/Simpan', 'MonitoringController@store');

    Route::get('/MonitoringAset/PerencanaanMonitoring/Simpan', 'MonitoringController@store');

    Route::get('/MonitoringAset/PerencanaanMonitoring/Ubah/{id}', 'MonitoringController@edit');

    Route::post('/MonitoringAset/PerencanaanMonitoring/Kirim/{id}', 'MonitoringController@update');

    Route::get('/MonitoringAset/PerencanaanMonitoring/Hapus/{id}', 'MonitoringController@destroy');


    // Kelola Pengguna
    Route::get('/KelolaPengguna', 'UserController@index');

    Route::get('/KelolaPengguna/Tambah', 'UserController@create');

    Route::post('/KelolaPengguna/Simpan', 'UserController@store');

    Route::get('/KelolaPengguna/Ubah/{id}', 'UserController@edit');

    Route::post('/KelolaPengguna/Kirim/{id}', 'UserController@update');

    Route::get('/KelolaPengguna/Hapus/{id}', 'UserController@destroy');

    // Kelola Unit
    Route::get('/KelolaPengguna/KelolaUnit', 'UnitController@index')->name('kelola-unit');

    Route::post('/KelolaPengguna/KelolaUnit/Simpan', 'UnitController@store');

    Route::post('/KelolaPengguna/KelolaUnit/Kirim/{id}', 'UnitController@update');

    Route::get('/KelolaPengguna/KelolaUnit/Hapus/{id}', 'UnitController@destroy');

});


// VISITOR
Route::group(['middleware' => 'auth','isAdmin:visitor'],function(){

    //  DASHBOARD 
    Route::get('/visitor/dashboard', 'PeminjamanController@index')->name('visitor-dashboard');

    // PERMOHONAN ASET

    // PEMINJAMAN ASET
    Route::get('/visitor/PermohonanAset/PeminjamanAset', 'PeminjamanController@create')->name('visitor-peminjaman');

    Route::post('/visitor/PermohonanAset/PeminjamanAset/Simpan', 'PeminjamanController@store');

    Route::get('/visitor/PermohonanAset/PeminjamanAset/Ubah/{id}', 'PeminjamanController@edit');

    Route::post('/visitor/PermohonanAset/PeminjamanAset/Kirim/{id}', 'PeminjamanController@update');

    Route::get('/visitor/PermohonanAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroy');


    // PENGADAAAN ASET
    Route::get('/visitor/PermohonanAset/PengadaanAset', 'PengadaanController@create')->name('visitor-pengadaan');

    Route::post('/visitor/PermohonanAset/PengadaanAset/Simpan', 'PengadaanController@store');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Ubah/{id}', 'PengadaanController@edit');

    Route::post('/visitor/PermohonanAset/PengadaanAset/Kirim/{id}', 'PengadaanController@update');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Hapus/{id}', 'PengadaanController@destroy');


    // MONITORING ASET
    Route::get('/visitor/MonitoringAset', 'MonitoringController@indexVisitor')->name('monitoring-aset');

    Route::get('/visitor/MonitoringAset/PersetujuanMonitoring/{id}', 'MonitoringController@persetujuan');

    Route::post('/MonitoringAset/PersetujuanMonitoring/Kirim/{id}', 'MonitoringController@updatePersetujuan');



});

