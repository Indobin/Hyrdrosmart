<?php

namespace Database\Seeders;

use App\Models\Penyiraman;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenyiramanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyiraman = [
            [
                'mode' => 'otomatis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'mode' => 'manual',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($penyiraman as $data) {
            Penyiraman::create($data);
        }
    }
}
