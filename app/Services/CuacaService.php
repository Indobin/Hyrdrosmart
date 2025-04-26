<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CuacaService
{
    public function getWeather($lat, $lon)
    {
        $response = Http::get("https://api.open-meteo.com/v1/forecast", [
            'latitude' => $lat,
            'longitude' => $lon,
            'current' => 'temperature_2m,weather_code',
            'timezone' => 'auto',
        ]);

        $data = $response->json();

        return [
            'temperature' => round($data['current']['temperature_2m']),
            'description' => $this->getWeatherDescription($data['current']['weather_code']),
        ];
    }

    private function getWeatherDescription($code)
    {
        $descriptions = [
            0 => 'Cerah',
            1 => 'Cerah sebagian',
            2 => 'Berawan',
            3 => 'Mendung',
            45 => 'Kabut',
            48 => 'Kabut beku',
            51 => 'Gerimis ringan',
            53 => 'Gerimis sedang',
            55 => 'Gerimis lebat',
            61 => 'Hujan ringan',
            63 => 'Hujan sedang',
            65 => 'Hujan lebat',
            80 => 'Hujan ringan (deras)',
            81 => 'Hujan sedang (deras)',
            82 => 'Hujan lebat (deras)',
        ];

        return $descriptions[$code] ?? 'Tidak diketahui';
    }
}

?>