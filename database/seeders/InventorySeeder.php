<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['Semen Portland (OPC)', 'Binder', 1200, 'Zak', 'Stable', 75000],
            ['Semen PPC 40kg', 'Binder', 850, 'Zak', 'Stable', 58000],
            ['Besi Beton Polos 8mm', 'Structure', 500, 'Btg', 'Incoming', 65000],
            ['Besi Beton Ulir 13mm', 'Structure', 800, 'Btg', 'Stable', 135000],
            ['Pasir Pasang', 'Aggregates', 120, 'm3', 'Low', 220000],
            ['Pasir Beton', 'Aggregates', 150, 'm3', 'Stable', 245000],
            ['Batu Belah', 'Aggregates', 80, 'm3', 'Stable', 280000],
            ['Sirtu', 'Aggregates', 200, 'm3', 'Stable', 185000],
            ['Kayu Meranti 4x6', 'Structure', 150, 'Btg', 'Stable', 45000],
            ['Kayu Kruing 5x10', 'Structure', 120, 'Btg', 'Stable', 85000],
            ['Bata Merah Press', 'Finishing', 15000, 'Pcs', 'High', 950],
            ['Bata Ringan (Hebel)', 'Finishing', 240, 'm3', 'Stable', 650000],
            ['Pipa HDPE 2"', 'Plumbing', 300, 'Mtr', 'Stable', 45000],
            ['Pipa PVC AW 4"', 'Plumbing', 150, 'Btg', 'Stable', 185000],
            ['Cat Tembok Propan 20kg', 'Finishing', 45, 'Pail', 'Stable', 1200000],
            ['Cat Dasar Alkali', 'Finishing', 30, 'Pail', 'Stable', 850000],
            ['Kabel NYM 3x2.5mm', 'Electrical', 20, 'Roll', 'Low', 1150000],
            ['Lampu LED 12W', 'Electrical', 200, 'Pcs', 'Stable', 45000],
            ['Stop Kontak Broco', 'Electrical', 150, 'Pcs', 'Stable', 22000],
            ['Semen Mortar Utama', 'Binder', 400, 'Zak', 'Stable', 115000],
            ['Wiremesh M8', 'Structure', 60, 'Lbr', 'Incoming', 720000],
            ['Baja Ringan C75', 'Structure', 500, 'Btg', 'High', 95000],
            ['Reng Baja Ringan', 'Structure', 800, 'Btg', 'High', 45000],
            ['Atap Spandek 0.3mm', 'Finishing', 300, 'Mtr', 'Stable', 65000],
            ['Genteng Metal Pasir', 'Finishing', 1200, 'Lbr', 'Stable', 35000],
            ['Triplek 9mm', 'Logistics', 100, 'Lbr', 'Stable', 125000],
            ['Triplek 12mm', 'Logistics', 80, 'Lbr', 'Stable', 165000],
            ['Paku Kayu 5cm', 'Logistics', 50, 'Kg', 'Stable', 22000],
            ['Paku Beton 7cm', 'Logistics', 30, 'Dus', 'Stable', 45000],
            ['Kawat Bendrat', 'Logistics', 100, 'Roll', 'Stable', 18000],
            ['Baut Baja Ringan', 'Logistics', 5000, 'Pcs', 'High', 250],
            ['Floor Drain Stainless', 'Plumbing', 60, 'Pcs', 'Stable', 85000],
            ['Kran Air 1/2"', 'Plumbing', 100, 'Pcs', 'Stable', 35000],
            ['Tangki Air 1000L', 'Plumbing', 5, 'Unit', 'Critical', 1500000],
            ['Pompa Air Simizu', 'Plumbing', 8, 'Unit', 'Stable', 650000],
            ['Keramik 40x40 Putih', 'Finishing', 250, 'Dus', 'Stable', 65000],
            ['Granit 60x60 Cream', 'Finishing', 150, 'Dus', 'Stable', 185000],
            ['Nat Keramik Sika', 'Finishing', 100, 'Bks', 'Stable', 15000],
            ['Lem Aibon 1kg', 'Logistics', 24, 'Blek', 'Stable', 65000],
            ['Thinner Impala', 'Logistics', 40, 'Ltr', 'Stable', 28000],
            ['Kuas Cat 3"', 'Logistics', 120, 'Pcs', 'Stable', 12000],
            ['Roll Cat Prima', 'Logistics', 60, 'Pcs', 'Stable', 35000],
            ['Sirtu Urug', 'Aggregates', 300, 'm3', 'High', 160000],
            ['Tanah Merah', 'Aggregates', 100, 'm3', 'Stable', 120000],
            ['Batu Split 1/2', 'Aggregates', 120, 'm3', 'Stable', 265000],
            ['Batu Split 2/3', 'Aggregates', 100, 'm3', 'Stable', 255000],
            ['Pebble Stone White', 'Finishing', 50, 'Karung', 'Incoming', 45000],
            ['Glass Block', 'Finishing', 400, 'Pcs', 'Stable', 25000],
            ['Asbes Gelombang', 'Finishing', 150, 'Lbr', 'Low', 55000],
            ['Glasswool 25mm', 'Finishing', 10, 'Roll', 'Stable', 450000],
            ['Aluminium Foil Single', 'Finishing', 15, 'Roll', 'Stable', 350000],
            ['Sealant Silicone', 'Logistics', 60, 'Tube', 'Stable', 35000],
            ['Skrup Gypsum', 'Logistics', 2000, 'Pcs', 'Stable', 150],
            ['Lis Profil Kayu', 'Finishing', 100, 'Btg', 'Stable', 25000],
            ['Papan Gypsum 9mm', 'Finishing', 200, 'Lbr', 'Stable', 68000],
            ['Hollow Galvalum 2x4', 'Structure', 400, 'Btg', 'Stable', 28000],
            ['Hollow Galvalum 4x4', 'Structure', 300, 'Btg', 'Stable', 35000],
            ['Box MCB 4 Group', 'Electrical', 30, 'Pcs', 'Stable', 45000],
            ['MCB Schneider 16A', 'Electrical', 50, 'Pcs', 'Stable', 65000],
            ['T-Dus Putih', 'Electrical', 300, 'Pcs', 'High', 3500],
            ['Pipa Conduit 20mm', 'Electrical', 200, 'Btg', 'Stable', 12000],
            ['Isolasi Unibel', 'Electrical', 100, 'Roll', 'Stable', 8500],
            ['Ready Mix K-300', 'Binder', 45, 'm3', 'Incoming', 950000],
            ['Ready Mix K-250', 'Binder', 30, 'm3', 'Incoming', 880000],
            ['Exhaust Fan KDK', 'Logistics', 12, 'Unit', 'Stable', 450000],
            ['Door Closer Dexon', 'Logistics', 20, 'Pcs', 'Stable', 185000],
            ['Handle Pintu Set', 'Finishing', 40, 'Set', 'Stable', 350000],
            ['Engsel Pintu 4"', 'Logistics', 100, 'Pasang', 'Stable', 45000],
            ['Gembok Yale 50mm', 'Logistics', 15, 'Pcs', 'Stable', 125000],
            ['Safety Helmet Red', 'Logistics', 50, 'Pcs', 'Stable', 65000],
        ];

        foreach ($data as $item) {
            \App\Models\Inventory::create([
                'name' => $item[0],
                'category' => $item[1],
                'stock' => $item[2],
                'unit' => $item[3],
                'status' => $item[4],
                'unit_price' => $item[5],
            ]);
        }
    }
}
