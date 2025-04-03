<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    });
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
