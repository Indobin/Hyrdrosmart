<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use Carbon\Carbon;

use App\Models\Penyiraman;
use App\Models\RiwayatMonitoring;
use Illuminate\Http\Request;
// use App\Services\MqttService;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Services\CuacaService;
class PenyiramanController extends Controller
{
    public function index()
    {
        return view('penyiraman.index');
    }

    public function penyiramanManual(CuacaService $cuacaService)
    {
        $response = Http::post('http://localhost:5000/api/publish', [
            'topic' => 'perintah/siram',
            'payload' => json_encode(['command' => 'start'])
        ]);
        $lat = -8.1625;
        $lon = 113.7101;
        $weather = $cuacaService->getWeather($lat, $lon);
        $cucaca = $weather['temperature'];
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        $tanggal = Carbon::now();
        RiwayatMonitoring::create([
            'cuaca' => $cucaca,
            'suhu' => $suhu,
            'kelembapan_tanah' => $kelembaban_tanah,
            'penyiraman_id' => 3,
            'tanggal_monitoring' => $tanggal
        ]);
        if ($response->successful()) {
        return response()->json(['message' => 'Penyiraman manual di-trigger dan perintah terkirim'], 200);
        } else {
            return response()->json(['message' => 'Gagal mengirim perintah penyiraman manual'], 500);
        }
    }

}
