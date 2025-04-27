<?php

namespace Database\Seeders;

use App\Models\Optimal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optimal = [
            'suhu_min' => 20,
            'suhu_max' => 40,
            'kelembaban_t_min' => 60,
            'kelembaban_t_max' =>90
        ];
        Optimal::create($optimal);
    }
}
