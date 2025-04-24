<?php

namespace App\Http\Controllers;
use App\Services\MqttService;
use App\Services\CuacaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(CuacaService $cuacaService) {
        $user = Auth::user();
        $cuaca = $cuacaService->getJemberWeather();
        return view('dashboard.index', compact('user', 'cuaca'));
    }
    public function monitoring()
    {
        return response()->stream(function() {
            $mqttService = new MqttService();
            
            $mqttService->subscribe('iot/sensors', function ($topic, $message) {
                $data = json_decode($message, true);
                echo "data: " . json_encode($data) . "\n\n";
                ob_flush();
                flush();
            });
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
        ]);
    }
}
