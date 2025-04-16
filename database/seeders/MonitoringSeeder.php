<?php

namespace Database\Seeders;

use App\Models\RiwayatMonitoring;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monitoring = [
            [
                'suhu_box' => 28.5,
                'kelembapan_tanah' => 45.2,
                'kelembapan_udara' => 60.1,
                'tanggal_monitoring' => Carbon::parse('2025-04-01 08:00:00'),
            ],
            [
                'suhu_box' => 29.1,
                'kelembapan_tanah' => 43.8,
                'kelembapan_udara' => 61.5,
                'tanggal_monitoring' => Carbon::parse('2025-04-02 08:00:00'),
            ],
            [
                'suhu_box' => 30.0,
                'kelembapan_tanah' => 42.0,
                'kelembapan_udara' => 63.2,
                'tanggal_monitoring' => Carbon::parse('2025-04-03 08:00:00'),
            ],
            [
                'suhu_box' => 28.7,
                'kelembapan_tanah' => 44.0,
                'kelembapan_udara' => 59.9,
                'tanggal_monitoring' => Carbon::parse('2025-04-04 08:00:00'),
            ],
            [
                'suhu_box' => 27.9,
                'kelembapan_tanah' => 46.5,
                'kelembapan_udara' => 58.7,
                'tanggal_monitoring' => Carbon::parse('2025-04-05 08:00:00'),
            ],
            [
                'suhu_box' => 29.3,
                'kelembapan_tanah' => 41.8,
                'kelembapan_udara' => 60.4,
                'tanggal_monitoring' => Carbon::parse('2025-04-06 08:00:00'),
            ],
            [
                'suhu_box' => 30.2,
                'kelembapan_tanah' => 40.0,
                'kelembapan_udara' => 62.1,
                'tanggal_monitoring' => Carbon::parse('2025-04-07 08:00:00'),
            ],
        ];
        foreach ($monitoring as $data ) {
            RiwayatMonitoring::create($data);
        }
    }
}
