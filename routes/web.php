<?php
use App\Http\Controllers\PanduanWebsiteController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\RiwayatMController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyiramanController;
use App\Http\Controllers\OptimalalisasiController;
use Symfony\Component\HttpFoundation\StreamedResponse;
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard-monitoring', [DashboardController::class, 'monitoring']);
    Route::get('/mqtt/publish-dummy', [DashboardController::class, 'publishDummyData']);
    Route::get('/mqtt/subscribe', [DashboardController::class, 'subscribeToSensor']);
    // Route::get('/events/stream', function () {
    //     return response()->stream(function () {
    //         $redis = Redis::connection();
    //         $pubsub = $redis->pubSubLoop();
    //         $pubsub->subscribe('sensor-data');
    
    //         foreach ($pubsub as $message) {
    //             if ($message->kind === 'message') {
    //                 echo "event: SensorDataUpdated\n";
    //                 echo "data: {$message->payload}\n\n";
    //                 ob_flush();
    //                 flush();
    //             }
    //         }
    //     }, 200, [
    //         'Content-Type' => 'text/event-stream',
    //         'Cache-Control' => 'no-cache',
    //         'Connection' => 'keep-alive',
    //     ]);
    // });
    Route::get('penyiraman', [PenyiramanController::class, 'index'])->name('penyiraman');
    Route::get('panduan', [PanduanWebsiteController::class, 'index'])->name('panduan');
    Route::get('riwayat-monitoring', [RiwayatMController::class, 'index'])->name('riwayat_monitoring');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
// Route::get('/monitoring/data', [MonitoringController::class, 'getDummyData']);