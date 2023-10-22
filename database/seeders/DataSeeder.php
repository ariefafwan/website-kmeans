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
        for ($i = 0; $i < 25; $i++) {
            Data::Create([
                'sample' => fake()->unique()->name(),
                'ph_air' => rand(1, 30),
                'desa_id' => 1,
                'clus_hasil_id' => 1,
                'ph_tanah' => rand(1, 30),
                'suhu' => rand(1, 30),
                'longitude' => 0.4763977,
                'latitude' => 101.3394463,
            ]);
        }
    }
}
