<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClusHasil;
use App\Models\Desa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(UserSeeder::class);
        Desa::Create([
            "title" => "Afwan",
        ]);

        // ClusHasil::Create([
        //     'name' => 'C1',
        //     'detail'  => 'Baik',
        //     // 'marker' => 'kuning.png'
        // ]);
        $this->call(DataSeeder::class);
    }
}
