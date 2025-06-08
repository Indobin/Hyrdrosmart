<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\MqttService;
use App\Services\CuacaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class DashboardController extends Controller
{
    public function index(CuacaService $cuacaService) {
        $suhu = Cache::get('suhu');
        $kelembaban_tanah = Cache::get('kelembaban_tanah');

       $user = Auth::user();
        $lat = -8.1625;
        $lon = 113.7101;
        $weather = $cuacaService->getWeather($lat, $lon);
        return view('dashboard.index', compact('user','suhu', 'kelembaban_tanah'))->with($weather);
    }
    public function getSensorData(Request $request)
    {
        $validasi = $request->validate([
            'suhu' => 'required|numeric',
            'kelembaban_tanah' => 'required|numeric'
        ]);
        Cache::put('suhu', $validasi['suhu'], now()->addMinutes(10));
        Cache::put('kelembaban_tanah', $validasi['kelembaban_tanah'], now()->addMinutes(10));

        return response()->json(['status' => 'success']);

    }




}
