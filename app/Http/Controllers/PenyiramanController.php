<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penyiraman;
use Illuminate\Http\Request;
// use App\Services\MqttService;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PenyiramanController extends Controller
{
    public function index()
    {
        return view('penyiraman.index');
    }

    public function penyiramanManual()
    {
        // $suhu = Cache::get('suhu');
        // $kelembaban_tanah = Cache::get('kelembaban_tanah');
        // $mode = 'manual';
        // $tanggal = Carbon::now();
        // $penyiraman = Penyiraman::create([
        //     'mode' => $mode,
        //     'created_at' => $tanggal
        // ]);
        // $penyiraman->riwayatMonitorings()->create([
        //     'suhu' => $suhu,
        //     'kelembapan_tanah' => $kelembaban_tanah,
        //     'tanggal_monitoring' => $tanggal
        // ]);
        $response = Http::post('http://localhost:5000/api/publish', [
            'topic' => 'penyiraman/manual',
            'payload' => json_encode(['command' => 'start'])
        ]);
         if ($response->successful()) {
        return response()->json(['message' => 'Penyiraman manual di-trigger dan perintah terkirim'], 200);
        } else {
            return response()->json(['message' => 'Gagal mengirim perintah penyiraman manual'], 500);
        }

        
    }
}
