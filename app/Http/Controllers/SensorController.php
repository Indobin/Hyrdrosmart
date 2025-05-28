<?php

namespace App\Http\Controllers;

use App\Models\Optimal;
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
        $validasi = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric'
        ]);
        Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
        Cache::put('kelembaban_tanah', $validasi['kelembaban_tanah'], now()->addMinutes(10));
        
        // $kondisi = Optimal::select(['suhu_min', 'suhu_max', 'kelembaban_t_min', 'kelembaban_t_max'])->first();
        // if (!$kondisi) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Data kondisi optimal belum tersedia di database.'
        //     ], 500);
        // }
        // if ($validasi['kelembaban_tanah'] > $kondisi->kelembaban_t_max ) {
        //     return response()->json([
        //     'status' => 'success',
        //     'message' => 'Data sensor kelembaban masih lebih tinggi. Tidak ada penyiraman karena kondisi belum terpenuhi.'
        //     ]);
        // }
        // if ($validasi['kelembaban_tanah'] < $kondisi->kelembaban_t_min) {

        // //     // Kirim perintah ke Python
        //     $response = Http::post('http://localhost:5000/api/publish', [
        //         'topic' => 'perintah/siram',
        //         'payload' => json_encode(['command' => 'start'])
        //     ]);
        //     // sleep(48);
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Data sensor tersimpan. Penyiraman dilakukan kelembaban tanah kering.'
        //     ]);
        // }
        // if ($validasi['suhu'] > $kondisi->suhu_max && $validasi['kelembaban_tanah'] < $kondisi->kelembaban_t_max) {
        //      $response = Http::post('http://localhost:5000/api/publish', [
        //         'topic' => 'perintah/siram',
        //         'payload' => json_encode(['command' => 'start'])
        //     ]);
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Data sensor tersimpan. Penyiraman karena dilakukan suhu panas dan kelembaban kering.'
        //     ]);
        // }

        // Jika tidak memenuhi syarat penyiraman otomatis
        return response()->json([
            'status' => 'success',
            'message' => 'Data sensor tersimpan. Tidak ada penyiraman karena kondisi belum terpenuhi.'
        ]);
    }

}
