<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ['Mandor Utama', 'Logistics Lead', 'Site Engineer', 'Fleet Supervisor', 'Safety Officer', 'Operator Excavator', 'Welder', 'Electrician', 'Surveyor'];
        $levels = ['Level 1 Security', 'Level 2 Security', 'Level 3 Security', 'Level 4 Security', 'Level 5 Security'];
        $sectors = ['Jakarta', 'Bekasi', 'BSD', 'Tangerang', 'Bogor', 'Central', 'South Sector'];
        $names = [
            'Ahmad Subarjo', 'Budi Santoso', 'Siti Rahma', 'Eko Prasetyo', 'Dewi Lestari', 
            'Rico Wijaya', 'Maya Putri', 'Hendra Gunawan', 'Linda Wardani', 'Fajar Sidik',
            'Aditya Pratama', 'Siska Amelia', 'Doni Hermawan', 'Rina Marlina', 'Agus Salim',
            'Taufik Hidayat', 'Yuni Shara', 'Bambang Pamungkas', 'Ani Yudhoyono', 'Dedi Mizwar',
            'Suleyman', 'Andre Taulany', 'Raffi Ahmad', 'Nagita Slavina', 'Baim Wong',
            'Paula Verhoeven', 'Atta Halilintar', 'Aurel Hermansyah', 'Deddy Corbuzier', 'Ivan Gunawan',
            'Ruben Onsu', 'Sarwendah', 'Zaskia Gotik', 'Vicky Prasetyo', 'Luna Maya',
            'Syahrini', 'Reino Barack', 'Gading Marten', 'Gisella Anastasia', 'Wijaya Saputra',
            'Ariel Noah', 'Sophia Latjuba', 'Pevita Pearce', 'Chelsea Islan', 'Nicholas Saputra',
            'Reza Rahadian', 'Dian Sastrowardoyo', 'Tara Basro', 'Joe Taslim', 'Iko Uwais'
        ];

        foreach ($names as $i => $name) {
            \App\Models\Worker::create([
                'registration_id' => 'ZT-OP-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'name' => $name,
                'position' => $positions[array_rand($positions)],
                'security_level' => $levels[array_rand($levels)],
                'sector' => $sectors[array_rand($sectors)],
                'efficiency' => rand(65, 99),
                'contact' => '0812-' . rand(1000, 9999) . '-' . rand(1000, 9999),
            ]);
        }
    }
}
