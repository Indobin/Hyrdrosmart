<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SensorController extends Controller
{
    public function index()
    {
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');
        
       var_dump($suhu);
       var_dump($kelembaban_tanah);
    }
    public function store(Request $request)
    {
        // Validasi (opsional)
        $validasi = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric'
        ]);
        Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
        Cache::put('kelembaban_tanah', $validasi['kelembaban_tanah'], now()->addMinutes(10));

        return response()->json(['status' => 'success']);
    }

    

}
