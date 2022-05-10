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

    Route::get('/ManajemenAset/PeminjamanAset', 'PeminjamanController@indexPeminjaman')->name('pinjam-aset-admin');


    Route::get('/ManajemenAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroyAdmin');

    
    Route::post('ManajemenAset/PeminjamanAset/Pengembalian/Simpan/{id}', 'PeminjamanController@prosesPengembalianPeminjaman');


      // Pengadaan Aset

      
    Route::get('/ManajemenAset/PengadaanAset', 'PengadaanController@indexPengadaan');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Setujui/{id}', 'PengadaanController@statusSetuju');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Tolak/{id}', 'PengadaanController@statusTolak');

    Route::get('/ManajemenAset/PengadaanAset/Hapus/{id}', 'PengadaanController@destroyAdmin');

    Route::post('/MonitoringAset/PengadaanAset/ProsesPR/Simpan/{id}', 'PengadaanController@prosesPR');

    Route::post('/MonitoringAset/PengadaanAset/ProsesPO/Simpan/{id}', 'PengadaanController@prosesPO');

  

    // MONITORING ASET

    // PERENCANAAN MONITORING
    Route::get('/MonitoringAset/PerencanaanMonitoring', 'MonitoringController@index')->name('perencanaan-monitoring');

    Route::get('/MonitoringAset/PerencanaanMonitoring/Tambah', 'MonitoringController@create')->name('tambah-perencanaan-monitoring');

    Route::post('/MonitoringAset/PerencanaanMonitoring/Simpan', 'MonitoringController@store');

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

    // PEMUSNAHAN BERKAS
    Route::get('/MonitoringAset/PemusnahanBerkas', 'PemusnahanController@indexBerkas')->name('musnah-berkas');

    Route::get('/MonitoringAset/PemusnahanBerkas/Tambah', 'PemusnahanController@createBerkas')->name('tambah-musnah-berkas');

    Route::post('/MonitoringAset/PemusnahanBerkas/Simpan', 'PemusnahanController@storeBerkas');

    Route::get('/MonitoringAset/PemusnahanBerkas/Ubah/{id}', 'PemusnahanController@editBerkas')->name('ubah-musnah-berkas');

    Route::post('/MonitoringAset/PemusnahanBerkas/Kirim/{id}', 'PemusnahanController@updateBerkas');

    Route::get('/MonitoringAset/PemusnahanBerkas/Hapus/{id}', 'PemusnahanController@destroyBerkas');

    Route::post('/MonitoringAset/PemusnahanBerkas/Bukti/{id}', 'PemusnahanController@tambahBuktiBerkas');

    // PEMUSNAHAN ASET
    Route::get('/MonitoringAset/PemusnahanAset', 'PemusnahanController@indexAset')->name('musnah-aset');

    Route::get('/MonitoringAset/PemusnahanAset/Tambah', 'PemusnahanController@createAset')->name('tambah-musnah-aset');

    Route::post('/MonitoringAset/PemusnahanAset/Simpan', 'PemusnahanController@storeAset');

    Route::get('/MonitoringAset/PemusnahanAset/Ubah/{id}', 'PemusnahanController@editAset')->name('ubah-musnah-Aset');

    Route::post('/MonitoringAset/PemusnahanAset/Kirim/{id}', 'PemusnahanController@updateAset');

    Route::get('/MonitoringAset/PemusnahanAset/Hapus/{id}', 'PemusnahanController@destroyAset');

    Route::post('/MonitoringAset/PemusnahanAset/Bukti/{id}', 'PemusnahanController@tambahBuktiAset');

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

    Route::post('/visitor/MonitoringAset/PersetujuanMonitoring/Simpan/{id}', 'MonitoringController@prosesPersetujuanMonitoring');

    // NOTIFIKASI
    Route::get('/notifikasi/{id}','NotifikasiController@destroy')->name('telah-dibaca');

    Route::get('/notifikasiUnit/{unit}','NotifikasiController@destroyInUnit');
    


});

// APPROVER
Route::group(['middleware' => 'auth','isAdmin:approver'],function(){
    Route::get('/approver/dashboard', function () {
        return view('approver.dashboard');
    });

    // PEMUSNAHAN 
    Route::get('/approver/Persetujuan/PemusnahanBerkas', 'PemusnahanController@indexBerkasApprover')->name('musnah-berkas-approver');

    Route::get('/approver/Persetujuan/PemusnahanAset', 'PemusnahanController@indexAsetApprover')->name('musnah-aset-approver');

    Route::get('/approver/Persetujuan/PeminjamanAset', 'PeminjamanController@indexApprover')->name('pinjam-aset-approver');

    Route::post('/approver/Persetujuan/PemusnahanBerkas/Simpan/{id}', 'PemusnahanController@prosesPemusnahanBerkas');

    Route::post('/approver/Persetujuan/PemusnahanAset/Simpan/{id}', 'PemusnahanController@prosesPemusnahanAset');


    // PENGADAAN
    Route::get('/approver/Persetujuan/PegadaanAset', 'PembelianController@indexApprover')->name('index-beli-approver');

    Route::post('/approver/Persetujuan/PegadaanAset/InternalPR/Simpan/{id}', 'PembelianController@prosesPersetujuanInternalPR');

    Route::post('/approver/Persetujuan/PegadaanAset/InternalPO/Simpan/{id}', 'PembelianController@prosesPersetujuanInternalPO');



    // PEMINJAMAN
    
    Route::get('/approver/Persetujuan/PeminjamanAset/Setujui/{id}', 'PeminjamanController@statusSetuju');

    Route::get('/approver/Persetujuan/PeminjamanAset/Tolak/{id}', 'PeminjamanController@statusTolak');

    Route::post('/approver/Persetujuan/PeminjamanAset/Simpan/{id}', 'PeminjamanController@prosesPeminjamanAset');

});

// TRANSACTOR

Route::group(['middleware' => 'auth','isAdmin:transactor'],function(){

    Route::get('/transactor/dashboard', function () {
        return view('transactor.dashboard');
    });

    Route::get('/transactor/PembelianAset/Internal', 'PembelianController@indexInternal')->name('index-internal');

    Route::post('/transactor/PembelianAset/Internal/Proses/Simpan/{id}', 'PembelianController@prosesPembelianInternal');

});
