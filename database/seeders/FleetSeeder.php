<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FleetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['EXCAVATOR CAT 320', 'Heavy Equipment', 'Hours'],
            ['DUMP TRUCK HINO 500', 'Logistics', 'KM'],
            ['BULLDOZER D6R', 'Heavy Equipment', 'Hours'],
            ['MOBILE CRANE 50T', 'Heavy Equipment', 'Hours'],
            ['TOWER CRANE POTAIN', 'Heavy Equipment', 'Hours'],
            ['LOADER KOMATSU WA200', 'Heavy Equipment', 'Hours'],
            ['GRADER MITSUBISHI', 'Heavy Equipment', 'Hours'],
            ['TANKER TRUCK MERCY', 'Logistics', 'KM'],
            ['CONCRETE PUMP', 'Heavy Equipment', 'Hours'],
            ['GENERATOR SET 500KVA', 'Utility', 'Hours'],
            ['FORKLIFT TOYOTA 5T', 'Logistics', 'Hours'],
            ['COMPACTOR DYNAPAC', 'Heavy Equipment', 'Hours'],
            ['TRAILER TRUCK UD', 'Logistics', 'KM'],
            ['WATER TANK TRUCK', 'Utility', 'KM'],
            ['WELDING MACHINE 400A', 'Utility', 'Hours'],
        ];

        $locations = ['Site C3', 'Bekasi Hub', 'Site 04', 'BSD HQ', 'Tangerang Yard', 'Bogor Project', 'Jakarta Central Site'];
        $statuses = ['Operational', 'Maintenance', 'Off-Hire'];

        for ($i = 0; $i < 30; $i++) {
            $unitData = $units[$i % count($units)];
            \App\Models\Fleet::create([
                'name' => $unitData[0] . ' #' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'serial_plate' => 'SN-' . rand(100, 999) . '-' . chr(rand(65, 90)) . rand(10, 99),
                'type' => $unitData[1],
                'location' => $locations[array_rand($locations)],
                'status' => $statuses[array_rand($statuses)],
                'usage_value' => rand(500, 20000) / 1,
                'usage_unit' => $unitData[2],
            ]);
        }
    }
}
