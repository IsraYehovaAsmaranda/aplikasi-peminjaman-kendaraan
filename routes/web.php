<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPemesananKendaraanController;
use App\Http\Controllers\PesanKendaraanController;
use App\Http\Middleware\EnsureIsAuthenticated;
use Illuminate\Support\Facades\Route;

// Authentication
Route::get('/login', [AuthController::class, 'index'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Setiap halaman yang harus login terlebih dahulu
Route::middleware([EnsureIsAuthenticated::class])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboardPage');

    // Pesan Kendaraan
    Route::get('/pesankendaraan', [PesanKendaraanController::class, 'index'])->name('pesanKendaraanPage');
    Route::get('/pesankendaraan/add', [PesanKendaraanController::class, 'indexTambahPesanan'])->name('addPesanKendaraanPage');
    Route::get('/pesankendaraan/update/{id}', [PesanKendaraanController::class, 'indexEditPesanan'])->name('editPesanKendaraanPage');
    Route::post('/pesankendaraan', [PesanKendaraanController::class, 'addPesanan'])->name('tambahPesanKendaraan');
    Route::put('/pesankendaraan/{id}', [PesanKendaraanController::class, 'editPesanan'])->name('updatePesanKendaraan');
    Route::put('/pesankendaraan/verify/{id}', [PesanKendaraanController::class, 'verifikasiPesanan'])->name('verifikasiPesanKendaraan');

    // Cari Kendaraan
    Route::get('/cari-kendaraan', [PesanKendaraanController::class, 'cariKendaraan']);

    // Laporan Pemesanan Kendaraan
    Route::get('/laporanpemesanan', [LaporanPemesananKendaraanController::class, 'index'])->name('laporanPemesananPage');
});
