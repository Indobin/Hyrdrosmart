<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CuacaService
{
    public function getJemberWeather()
    {
        try {
            $response = Http::timeout(5)->get('https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaTimur.xml');
            
            if (!$response->successful()) {
                throw new \Exception("Failed to fetch BMKG data. HTTP Status: " . $response->status());
            }

            $xml = simplexml_load_string($response->body());
            
            if ($xml === false) {
                throw new \Exception("Invalid XML data received from BMKG");
            }

            // Cari data Jember
            foreach ($xml->forecast->area as $area) {
                if (isset($area['description']) && (string)$area['description'] === 'Jember') {
                    $temp = $this->extractTemperature($area);
                    $weatherCode = $this->extractWeatherCode($area);
                    
                    return [
                        'temp' => $temp ?? '--',
                        'weather' => $this->translateWeather($weatherCode),
                        'source' => 'BMKG',
                        'updated_at' => now()->format('H:i')
                    ];
                }
            }

            throw new \Exception("Jember weather data not found in BMKG response");

        } catch (\Exception $e) {
            Log::error('WeatherService Error: ' . $e->getMessage());
            return $this->fallbackWeatherData();
        }
    }

    private function extractTemperature($area)
    {
        return isset($area->parameter[0]->timerange[0]->value) 
            ? (int)$area->parameter[0]->timerange[0]->value 
            : null;
    }

    private function extractWeatherCode($area)
    {
        return isset($area->parameter[2]->timerange[0]->value) 
            ? (string)$area->parameter[2]->timerange[0]->value 
            : null;
    }

    private function translateWeather(?string $code): string
    {
        if ($code === null) return 'Data tidak valid';

        return match($code) {
            '0' => 'Cerah',
            '1', '2' => 'Cerah Berawan',
            '3' => 'Berawan',
            '4' => 'Berawan Tebal',
            '5' => 'Udara Kabur',
            '10' => 'Asap',
            '45' => 'Kabut',
            '60' => 'Hujan Ringan',
            '61' => 'Hujan',
            '63' => 'Hujan Lebat',
            '80' => 'Hujan Lokal',
            default => 'Tidak Terdefinisi'
        };
    }

    private function fallbackWeatherData(): array
    {
        return [
            'temp' => '--',
            'weather' => 'Data tidak tersedia',
            'source' => 'Error',
            'updated_at' => now()->format('H:i')
        ];
    }
}