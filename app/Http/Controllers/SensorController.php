<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Optimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Services\CuacaService;
class SensorController extends Controller
{
    public function index()
    {
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        return response()->json([
        'suhu' => $suhu,
        'kelembaban_tanah' => $kelembaban_tanah
    ]);
    }
    public function store(Request $request, CuacaService $cuacaService)
    {
        $validasi = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric'
        ]);
        Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
        Cache::put('kelembaban_tanah', $validasi['kelembaban_tanah'], now()->addMinutes(10));
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        $lat = -8.1625;
        $lon = 113.7101;
        $weather = $cuacaService->getWeather($lat, $lon);
        $cucaca = $weather['temperature'];
        $tanggal = Carbon::now();
        $kondisi = Optimal::select(['suhu_min', 'suhu_max', 'kelembaban_t_min', 'kelembaban_t_max'])->first();
        if (!$kondisi) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data kondisi optimal belum tersedia di database.'
            ], 500);
        }
        if ($validasi['kelembaban_tanah'] > $kondisi->kelembaban_t_max ) {
            return response()->json([
            'status' => 'success',
            'message' => 'Data sensor kelembaban masih lebih tinggi. Tidak ada penyiraman karena kondisi belum terpenuhi.'
            ]);
        }
        if ($validasi['kelembaban_tanah'] < $kondisi->kelembaban_t_min) {

        //     // Kirim perintah ke Python
            $response = Http::post('http://localhost:5000/api/publish', [
                'topic' => 'perintah/siram',
                'payload' => json_encode(['command' => 'start'])
            ]);

                RiwayatMonitoring::create([
                    'cuaca' => $cucaca,
                    'suhu' => $suhu,
                    'kelembapan_tanah' => $kelembaban_tanah,
                    'penyiraman_id' => 1,
                    'tanggal_monitoring' => $tanggal
                ]);
            // Simpan data ke database
            return response()->json([
                'status' => 'success',
                'message' => 'Data sensor tersimpan. Penyiraman dilakukan kelembaban tanah rendah.'
            ]);
        }
        if ($validasi['suhu'] > $kondisi->suhu_max && $validasi['kelembaban_tanah'] < $kondisi->kelembaban_t_max) {
            $response = Http::post('http://localhost:5000/api/publish', [
                'topic' => 'perintah/siram',
                'payload' => json_encode(['command' => 'start'])
            ]);
            RiwayatMonitoring::create([
                'cuaca' => $cucaca,
                'suhu' => $suhu,
                'kelembapan_tanah' => $kelembaban_tanah,
                'penyiraman_id' => 1,
                'tanggal_monitoring' => $tanggal
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Data sensor tersimpan. Penyiraman karena dilakukan suhu tinggi dan kelembaban rendah.'
            ]);
        }

        // Jika tidak memenuhi syarat penyiraman otomatis
        return response()->json([
            'status' => 'success',
            'message' => 'Data sensor tersimpan. Tidak ada penyiraman karena kondisi belum terpenuhi.'
        ]);
    }

}
