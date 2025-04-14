<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyiramanController;
use App\Http\Controllers\OptimalalisasiController;
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('optimalisasi', [OptimalalisasiController::class, 'index'])->name('optimalisasi');
    Route::get('penyiraman', [PenyiramanController::class, 'index'])->name('penyiraman');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
