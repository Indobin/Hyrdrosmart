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
            'suhu_min' => 25,
            'suhu_max' => 35,
            'kelembaban_t_min' => 40,
            'kelembaban_t_max' =>75
        ];
        Optimal::create($optimal);
    }
}
