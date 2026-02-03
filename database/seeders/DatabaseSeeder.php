<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PerusahaanMitraSeeder::class,
        ]);

        $this->call([
            LokerSeeder::class,
        ]);

        $this->call([
            PencariKerjaSeeder::class,
        ]);
        
        $this->call([
            AdminSeeder::class,
        ]);

        $this->call([
            ApplySeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
