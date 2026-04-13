<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Add UserSeeder to create 50 realistic users
        $this->call([
            UserSeeder::class,
            MaterialPriceSeeder::class,
            ProjectSeeder::class,
            InventorySeeder::class,
            WorkerSeeder::class,
            FleetSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin Zetas',
            'email' => 'admin@zetas.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
