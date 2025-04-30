<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SensorController extends Controller
{
    public function index()
    {
        $suhu = Cache::get('suhu');
        $kelembaban = Cache::get('kelembaban');
        
       var_dump($suhu);
       var_dump($kelembaban);
    }
    public function store(Request $request)
    {
        // Validasi (opsional)
        $validasi = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban' => 'required|numeric'
        ]);
        Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
        Cache::put('kelembaban', $validasi['kelembaban'], now()->addMinutes(10));

        return response()->json(['status' => 'success']);
    }

    

}
