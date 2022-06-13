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
    return view('auth.index');
})->name('login');

Route::get('/daftar', function () {
    return view('auth.register');
})->name('daftar');



Route::get('/lupa-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');

Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 

Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');

Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');


Route::post('/daftar/simpan',  [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('simpan-daftar');

Route::get('/restricted', [App\Http\Controllers\HomeController::class, 'restricted'])->middleware(['role']);


Auth::routes();



// ADMIN

Route::middleware(['auth','isAdmin:administrator'])->group(function(){

    Route::get('/admin', function () {
        return view('admin/dashboard');
    });


    // Manajemen Data Aset

    // Data Aset

    Route::get('/dashboard', 'PengadaanController@dashboardAdmin')->name('dashboard');

    Route::get('/ManajemenAset/DataAset', 'ControllerDataAset@index');

    Route::get('/ManajemenAset/DataAset/Tambah', 'ControllerDataAset@create');

    Route::post('/ManajemenAset/DataAset/Simpan', 'ControllerDataAset@store');

    Route::get('/ManajemenAset/DataAset/Ubah/{id}', 'ControllerDataAset@edit');

    Route::post('/ManajemenAset/DataAset/Kirim/{id}', 'ControllerDataAset@update');

    Route::get('/ManajemenAset/DataAset/Hapus/{id}', 'ControllerDataAset@destroy');

    Route::get('/ManajemenAset/DataAset/Export/', 'ControllerDataAset@export');

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

    
    // PROFIL 
    Route::get('/profil', function () {
        return view('admin.profil');
    });

    Route::post('/profil/{id}', 'UserController@updateProfil');

    Route::post('/profil/password/{id}', 'UserController@updatePassword');

    // NOTIFIKASI
    Route::get('/notifikasi/{id}','NotifikasiController@destroy')->name('telah-dibaca');

    Route::get('/notifikasiUnit/{unit}','NotifikasiController@destroyInUnit');

    Route::get('/notifikasiRole/{role}','NotifikasiController@destroyInRole');

    // LAPORAN BULANAN
    Route::post('/LaporanBerkala/Ekspor', 'PengadaanController@exportLaporan');

    Route::get('/LaporanBerkala', function () {
        return view('admin.laporan_berkala.laporanBerkala');
    });

});


// VISITOR
Route::middleware(['auth','isAdmin:visitor'])->group(function(){

    //  DASHBOARD 
    Route::get('/visitor/dashboard', 'PeminjamanController@index')->name('visitor-dashboard');

    // PERMOHONAN ASET

    // PEMINJAMAN ASET
    // Route::get('/visitor/PermohonanAset/PeminjamanAset', 'PeminjamanController@create')->name('visitor-peminjaman');

    Route::get('/visitor/PermohonanAset/PeminjamanAset', 'PeminjamanController@indexVisitor')->name('visitor-peminjaman');


    Route::post('/visitor/PermohonanAset/PeminjamanAset/Simpan', 'PeminjamanController@store');

    Route::get('/visitor/PermohonanAset/PeminjamanAset/Ubah/{id}', 'PeminjamanController@edit');

    Route::post('/visitor/PermohonanAset/PeminjamanAset/Kirim/{id}', 'PeminjamanController@update');

    Route::get('/visitor/PermohonanAset/PeminjamanAset/Hapus/{id}', 'PeminjamanController@destroy');


    // PENGADAAAN ASET
    // Route::get('/visitor/PermohonanAset/PengadaanAset', 'PengadaanController@create')->name('visitor-pengadaan');

    Route::get('/visitor/PermohonanAset/PengadaanAset', 'PengadaanController@index')->name('visitor-pengadaan');

    Route::post('/visitor/PermohonanAset/PengadaanAset/Simpan', 'PengadaanController@store');

    // Route::get('/visitor/PermohonanAset/PengadaanAset/Ubah/{id}', 'PengadaanController@edit');

    Route::post('/visitor/PermohonanAset/PengadaanAset/Kirim/{id}', 'PengadaanController@update');

    Route::get('/visitor/PermohonanAset/PengadaanAset/Hapus/{id}', 'PengadaanController@destroy');
    


    // MONITORING ASET
    Route::get('/visitor/MonitoringAset', 'MonitoringController@indexVisitor')->name('monitoring-aset');

    Route::post('/visitor/MonitoringAset/PersetujuanMonitoring/Simpan/{id}', 'MonitoringController@prosesPersetujuanMonitoring');

    // NOTIFIKASI
    Route::get('/visitor/notifikasi/{id}','NotifikasiController@destroy')->name('telah-dibaca');

    Route::get('/visitor/notifikasiUnit/{unit}','NotifikasiController@destroyInUnit');

    Route::get('/visitor/notifikasiRole/{role}','NotifikasiController@destroyInRole');

    
    // PROFIL 
    Route::get('/visitor/profil', function () {
        return view('visitor.profil');
    });

    Route::post('/visitor/profil/{id}', 'UserController@updateProfil');

    Route::post('/profil/password/{id}', 'UserController@updatePassword');

});

// APPROVER
Route::middleware(['auth','isAdmin:approver'])->group(function(){

    Route::get('/approver/dashboard', 'PengadaanController@dashboardApprover')->name('dashboard-approver');

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

    // PROFIL 
    Route::get('/approver/profil', function () {
        return view('approver.profil');
    });

    Route::post('/approver/profil/{id}', 'UserController@updateProfil');

    Route::post('/profil/password/{id}', 'UserController@updatePassword');


    // DASHBOARD
    Route::get('/approver/dashboard', 'PengadaanController@dashboardApprover')->name('index-approver');

    // NOTIFIKASI
    Route::get('/approver/notifikasi/{id}','NotifikasiController@destroy')->name('telah-dibaca');

    Route::get('/approver/notifikasiUnit/{unit}','NotifikasiController@destroyInUnit');

    Route::get('/approver/notifikasiRole/{role}','NotifikasiController@destroyInRole');

    // LAPORAN BULANAN
    Route::post('/approver/LaporanBerkala/Ekspor', 'PengadaanController@exportLaporan');

    Route::get('/approver/LaporanBerkala', function () {
        return view('approver.laporan_berkala.laporanBerkala');
    });

});

// TRANSACTOR

Route::middleware(['auth','isAdmin:transactor'])->group(function(){

    Route::get('/transactor/dashboard', function () {
        return view('transactor.dashboard');
    });

    Route::get('/transactor/PembelianAset/Internal', 'PembelianController@indexInternal')->name('index-internal');

    Route::get('/transactor/PembelianAset/Eksternal', 'PembelianController@indexEksternal')->name('index-eksternal');

    Route::post('/transactor/PembelianAset/Internal/Proses/Simpan/{id}', 'PembelianController@prosesPembelianInternal');

    // PROFIL 
    Route::get('/transactor/profil', function () {
        return view('transactor.profil');
    });

    Route::post('/transactor/profil/{id}', 'UserController@updateProfil');

    Route::post('/profil/password/{id}', 'UserController@updatePassword');

     // DASHBOARD
     Route::get('/transactor/dashboard', 'PengadaanController@dashboardTransactor')->name('index-transactor');

      // NOTIFIKASI
    Route::get('/transactor/notifikasi/{id}','NotifikasiController@destroy')->name('telah-dibaca');

    Route::get('/transactor/notifikasiUnit/{unit}','NotifikasiController@destroyInUnit');

    Route::get('/transactor/notifikasiRole/{role}','NotifikasiController@destroyInRole');

});
