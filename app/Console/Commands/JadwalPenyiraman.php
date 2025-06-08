<?php

namespace App\Console\Commands;

use App\Models\Penyiraman;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\RiwayatMonitoring;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Services\CuacaService;
class JadwalPenyiraman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penyiraman:jadwal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CuacaService $cuacaService)
    {
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
            'penyiraman_id' => 2,
            'tanggal_monitoring' => $tanggal
        ]);
        $response = Http::post('http://localhost:5000/api/publish', [
            'topic' => 'perintah/siram',
            'payload' => json_encode(['command' => 'start'])
        ]);
        if ($response->successful()) {
        return response()->json(['message' => 'Penyiraman jadwal di-trigger dan perintah terkirim'], 200);
        } else {
            return response()->json(['message' => 'Gagal mengirim perintah penyiraman jadwal'], 500);
        }
    }
}
