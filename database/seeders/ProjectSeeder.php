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
        $sectors = ['Jakarta', 'West Java', 'East Java', 'Central Java', 'Sumatera', 'Kalimantan'];
        $statuses = ['Active Zone', 'Verification', 'Site Clearing', 'Structure Mode', 'Finishing Step'];
        $priorities = ['Priority 01', 'Final Phase', 'Operational', 'Emergency', 'Maintenance'];
        $milestones = ['Pondasi Zona', 'Struktur Utama', 'Atap & Finishing', 'Serah Terima', 'Sertifikasi SLO'];

        for ($i = 1; $i <= 60; $i++) {
            $isHighlighted = $i % 2 == 0;
            $sector = $sectors[array_rand($sectors)];
            
            \App\Models\Project::create([
                'name' => "Construction Project ZT-" . str_pad($i, 3, '0', STR_PAD_LEFT) . " " . $sector,
                'address' => "Industrial Zone Section " . $i . ", " . $sector,
                'sector' => $sector,
                'node_id' => "ZT-" . str_pad($i, 3, '0', STR_PAD_LEFT),
                'progress' => rand(10, 100),
                'status' => $statuses[array_rand($statuses)],
                'priority' => $priorities[array_rand($priorities)],
                'milestone_name' => $milestones[array_rand($milestones)] . " " . chr(rand(65, 70)),
                'milestone_date' => now()->addDays(rand(10, 100))->format('Y-m-d'),
                'milestone_status' => 'Pending Audit',
                'team_size' => rand(5, 50),
                'is_highlighted' => $isHighlighted,
            ]);
        }
    }
}
