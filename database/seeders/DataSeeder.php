<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enum = ['C1', 'C2', 'C3'];
        for ($i = 0; $i < 25; $i++) {
            Data::Create([
                'luas_tanah' => rand(1, 30),
                'ph_air' => rand(1, 30),
                'desa_id' => 1,
                'clus_hasil' => $enum[rand(0, (count($enum) - 1))],
                'ph_tanah' => rand(1, 30),
                'curah_hujan' => rand(1, 30),
                'suhu' => rand(1, 30),
                'longitude' => 0.4763977,
                'latitude' => 101.3394463,
            ]);
        }
    }
}
