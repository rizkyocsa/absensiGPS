<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DepartemenController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest:karyawan'])->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/proseslogin', [AuthController::class, 'proseslogin']);
});

Route::middleware(['guest:user'])->group(function(){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:karyawan'])->group(function(){

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Presensi
    Route::get('/presensi/create', [PresensiController::class, 'create'])->name('presensi.create');
    Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');

    //Logout
    Route::get('/proseslogout', [AuthController::class, 'proseslogout']);

    
    // Profile
    Route::get('/editprofile', [PresensiController::class, 'editprofile']);
    Route::post('/presensi/{nik}/updateprofile', [PresensiController::class, 'updateprofile']);
    
    // History
    Route::get('/presensi/history', [PresensiController::class, 'history']);
    Route::post('/gethistory', [PresensiController::class, 'gethistory']);

    // Izin / Cuti
    Route::get('/presensi/izin', [PresensiController::class, 'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class, 'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class, 'storeizin']);
    Route::post('/presensi/cekizin', [PresensiController::class, 'cekizin']);
});     

Route::middleware(['auth:user'])->group(function(){

    // Dashboard Admin
    Route::get('/panel/dashboardadmin', [DashboardController::class, 'dashboardadmin']);

    //Logout
    Route::get('/panel/proseslogoutadmin', [AuthController::class, 'proseslogoutadmin']);

    // CRUD Karyawan
    Route::get('/panel/karyawan', [KaryawanController::class, 'index']);
    Route::post('/panel/karyawan/store', [KaryawanController::class, 'store']);
    Route::post('/panel/karyawan/edit', [KaryawanController::class, 'edit']);
    Route::post('/panel/karyawan/{nik}/update', [KaryawanController::class, 'update']);
    Route::post('/panel/karyawan/{nik}/delete', [KaryawanController::class, 'delete']);

    // CRUD Departemen
    Route::get('/panel/departemen', [DepartemenController::class, 'index']);
    Route::post('/panel/departemen/store', [DepartemenController::class, 'store']);
    Route::post('/panel/departemen/edit', [DepartemenController::class, 'edit']);
    Route::post('/panel/departemen/{kode_dept}/update', [DepartemenController::class, 'update']);

    //Presensi
    Route::get('/panel/presensi/monitoring', [PresensiController::class, 'monitoring']);
    Route::post('/panel/getpresensi', [PresensiController::class, 'getpresensi']);

    //Laporan
    Route::get('/panel/laporan/presensi', [PresensiController::class, 'laporan']);
    Route::post('/panel/presensi/cetaklaporan', [PresensiController::class, 'cetaklaporan']);
    Route::get('/panel/laporan/rekap', [PresensiController::class, 'rekap']);
    Route::post('/panel/presensi/cetakrekap', [PresensiController::class, 'cetakrekap']);
    
    //Izin Sakit
    Route::get('/panel/presensi/izinsakit', [PresensiController::class, 'izinsakit']);
    Route::post('/panel/presensi/approved', [PresensiController::class, 'approved']);
    Route::get('/panel/presensi/{id}/batalkan', [PresensiController::class, 'batalkan']);

});


