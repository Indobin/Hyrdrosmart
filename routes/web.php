<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RiwayatMController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PenyiramanController;
use App\Http\Controllers\OptimalalisasiController;
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard-monitoring', [DashboardController::class, 'monitoring']);
    Route::get('optimalisasi', [OptimalalisasiController::class, 'index'])->name('optimalisasi');
    Route::get('penyiraman', [PenyiramanController::class, 'index'])->name('penyiraman');
    Route::get('riwayat-monitoring', [RiwayatMController::class, 'index'])->name('riwayat_monitoring');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/monitoring', [MonitoringController::class, 'index']);
Route::get('/monitoring/stream', [MonitoringController::class, 'stream']);
// Route::get('/monitoring/data', [MonitoringController::class, 'getDummyData']);