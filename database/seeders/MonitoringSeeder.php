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
        $penyiraman = DB::table('penyiraman')->first();
        $monitoring = [
            [
                'suhu' => 30.5,
                'kelembapan_tanah' => 60.2,
                'penyiraman_id' => $penyiraman->id,
                'tanggal_monitoring' => Carbon::now(),
            ],
            [
                'suhu' => 28.7,
                'kelembapan_tanah' => 55.5,
                'penyiraman_id' => $penyiraman->id,
                'tanggal_monitoring' => Carbon::now()->addDay(1),

            ],
        ];
        foreach ($monitoring as $data ) {
            RiwayatMonitoring::create($data);
        }
    }
}
