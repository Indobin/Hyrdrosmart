<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
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
    public function store(Request $request)
{
    // Validasi
    $validasi = $request->validate([
        'suhu' => 'required|numeric',
        'kelembaban_tanah' => 'required|numeric'
    ]);

    // Simpan ke cache
    Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
    Cache::put('kelembaban_tanah', $validasi['kelembaban_tanah'], now()->addMinutes(10));

    // Cek kondisi penyiraman otomatis
    if ($validasi['suhu'] > 100 || $validasi['kelembaban_tanah'] < 60) {

        // $tanggal = now();
        // $mode = 'otomatis';

        // $penyiraman = \App\Models\Penyiraman::create([
        //     'mode' => $mode,
        //     'created_at' => $tanggal
        // ]);

        // $penyiraman->riwayatMonitorings()->create([
        //     'suhu' => $validasi['suhu'],
        //     'kelembapan_tanah' => $validasi['kelembaban_tanah'],
        //     'tanggal_monitoring' => $tanggal
        // ]);

        // Kirim perintah ke Python
        $response = Http::post('http://localhost:5000/api/publish', [
            'topic' => 'perintah/siram',
            'payload' => json_encode(['command' => 'start'])
        ]);

        if ($response->successful()) {
            return response()->json(['status' => 'success', 'message' => 'Penyiraman otomatis dilakukan dan perintah dikirim']);
        } else {
            return response()->json(['status' => 'warning', 'message' => 'Penyiraman tercatat, tapi gagal kirim perintah ke Python']);
        }
    }

    // Jika tidak memenuhi syarat penyiraman otomatis
    return response()->json([
        'status' => 'success',
        'message' => 'Data sensor tersimpan. Tidak ada penyiraman karena kondisi belum terpenuhi.'
    ]);
}

}
