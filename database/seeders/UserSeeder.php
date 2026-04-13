<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 50 users using the factory
        User::factory(50)->create([
            'password' => Hash::make('password'), // Uniform password for convenience
        ]);

        $this->command->info('50 users created successfully.');
    }
}
