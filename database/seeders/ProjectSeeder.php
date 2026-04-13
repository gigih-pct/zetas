<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project::create([
            'name' => 'Warehouse C3 Jakarta',
            'address' => 'Jl. Daan Mogot, Jakarta Barat',
            'sector' => 'West',
            'node_id' => 'ZT-01',
            'progress' => 35,
            'status' => 'Active Zone',
            'priority' => 'Priority 01',
            'milestone_name' => 'Pondasi Zona C-4',
            'milestone_date' => '2024-10-24',
            'milestone_status' => 'Ready for Audit',
            'team_size' => 16,
            'is_highlighted' => false,
        ]);

        \App\Models\Project::create([
            'name' => 'Zetas HQ Extension',
            'address' => 'BSD City, Tangerang',
            'sector' => 'Central',
            'node_id' => 'ZT-42',
            'progress' => 92,
            'status' => 'Verification',
            'priority' => 'Final Phase',
            'milestone_name' => 'Site Clearing Complete',
            'milestone_date' => '2024-11-15',
            'milestone_status' => 'Ready for Audit',
            'team_size' => 3,
            'is_highlighted' => true,
        ]);
    }
}
