<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Region::updateOrCreate(
            ['name' => 'DI Yogyakarta'],
            [
                'land_price_ref' => 3500000, // Rp 3.5jt / m2 (Average)
                'material_multiplier' => 1.05, // Slightly higher logistics to site
                'labor_multiplier' => 0.85, // Lower UMR / Wage
                'notes' => 'Fokus pada material lokal (Pasir Merapi, Bata Godean).'
            ]
        );

        \App\Models\Region::updateOrCreate(
            ['name' => 'DKI Jakarta'],
            [
                'land_price_ref' => 15000000, // Rp 15jt / m2 (Base)
                'material_multiplier' => 1.0,
                'labor_multiplier' => 1.2,
                'notes' => 'Pusat harga standar.'
            ]
        );
    }
}
