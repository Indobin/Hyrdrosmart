<?php

namespace App\Console\Commands;

use App\Models\Penyiraman;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\RiwayatMonitoring;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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
    public function handle()
    {
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        $mode = 'jadwal';
        $tanggal = Carbon::now();
        $penyiraman = Penyiraman::create([
            'mode' => $mode,
            'created_at' => $tanggal
        ]);
        $penyiraman->riwayatMonitorings()->create([
            'suhu' => $suhu,
            'kelembapan_tanah' => $kelembaban_tanah,
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
