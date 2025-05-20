<?php
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RiwayatMController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyiramanController;
use App\Http\Controllers\PanduanWebsiteController;

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/sensor', [DashboardController::class, 'getSensorData']);
    Route::get('/sensor-latest', function () {
        return response()->json([
            'suhu' => Cache::get('suhu'),
            'kelembaban_tanah' => Cache::get('kelembaban_tanah'),
        ]);
    });
    Route::get('/cache-check', function () {
        return [
            'suhu' => Cache::get('suhu'),
            'kelembaban' => Cache::get('kelembaban')
        ];
    });
    Route::get('penyiraman', [PenyiramanController::class, 'index'])->name('penyiraman');
    Route::post('penyiraman-manual',[PenyiramanController::class, 'penyiramanManual'])->name('penyiraman_manual');
    Route::get('panduan', [PanduanWebsiteController::class, 'index'])->name('panduan');
    Route::get('riwayat-monitoring', [RiwayatMController::class, 'index'])->name('riwayat_monitoring');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::post('api/mqtt-data', [MqttController::class, 'index']);
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
// Route::get('/monitoring/data', [MonitoringController::class, 'getDummyData']);