<?php 
// routes/api.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
    Route::post('/sensor', [SensorController::class, 'store']);
    Route::get('/sensor/tampil', [SensorController::class, 'index']);
?>