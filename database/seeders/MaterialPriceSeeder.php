<?php

namespace Database\Seeders;

use App\Models\MaterialPrice;
use Illuminate\Database\Seeder;

class MaterialPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // 1. Kategori Beton & Semen
            ['Beton & Semen', 'Semen Portland (OPC) 50kg', 'Sak', 65000, 75000],
            ['Beton & Semen', 'Semen PPC 40kg', 'Sak', 52000, 60000],
            ['Beton & Semen', 'Beton Readymix K-250 (Non-Fly Ash)', 'm³', 850000, 950000],
            ['Beton & Semen', 'Beton Readymix K-350 (Prestress)', 'm³', 1050000, 1200000],
            ['Beton & Semen', 'Beton Readymix K-500', 'm³', 1350000, 1500000],
            ['Beton & Semen', 'U-Ditch 400 x 400 x 1200 mm', 'Pcs', 450000, 600000],
            ['Beton & Semen', 'Box Culvert 1000 x 1000 mm', 'Pcs', 2800000, 3500000],
            ['Beton & Semen', 'Paving Block Press Hidrolik t=8cm', 'm²', 110000, 135000],
            ['Beton & Semen', 'Kanstin Beton 40 x 25 x 15 cm', 'Pcs', 45000, 65000],
            ['Beton & Semen', 'Buis Beton Ø 60 cm', 'Pcs', 250000, 350000],

            // 2. Kategori Baja & Besi Tulangan
            ['Baja & Besi', 'Besi Beton Polos (Ø 8mm - 12mm)', 'Kg', 12500, 14500],
            ['Baja & Besi', 'Besi Beton Ulir (D 13mm - 25mm)', 'Kg', 13000, 15500],
            ['Baja & Besi', 'Baja Profil H-Beam / I-WF', 'Kg', 16000, 19500],
            ['Baja & Besi', 'Wiremesh M8 (Lembar 2.1m x 5.4m)', 'Lbr', 650000, 750000],
            ['Baja & Besi', 'Kawat Bendrat (Pengikat)', 'Roll', 350000, 450000],
            ['Baja & Besi', 'Pipa Galvanis Medium 2 inch', 'Batang', 450000, 550000],
            ['Baja & Besi', 'Baut HTB A325 M20 x 65', 'Pcs', 25000, 35000],
            ['Baja & Besi', 'Sheet Pile Baja (Type II)', 'Ton', 18000000, 22000000],
            ['Baja & Besi', 'Tiang Pancang (Spun Pile) Ø 400mm', 'Meter', 450000, 600000],
            ['Baja & Besi', 'Guardrail (Pagar Pengaman Jalan)', 'Meter', 550000, 750000],

            // 3. Kategori Aspal & Agregat
            ['Aspal & Agregat', 'Aspal Hotmix AC-WC (Gelar)', 'm²', 180000, 250000],
            ['Aspal & Agregat', 'Aspal Hotmix AC-BC', 'm²', 165000, 210000],
            ['Aspal & Agregat', 'Aspal Curah 60/70', 'Drum', 1800000, 2200000],
            ['Aspal & Agregat', 'Tack Coat (Aspal Emulsi)', 'Liter', 15000, 22000],
            ['Aspal & Agregat', 'Batu Pecah / Split (1/2 atau 2/3)', 'm³', 280000, 350000],
            ['Aspal & Agregat', 'Pasir Pasang / Beton', 'm³', 250000, 320000],
            ['Aspal & Agregat', 'Sirtu (Pasir Batu)', 'm³', 180000, 230000],
            ['Aspal & Agregat', 'Tanah Urug (Limbah Tambang)', 'm³', 90000, 130000],
            ['Aspal & Agregat', 'Batu Kali / Batu Belah', 'm³', 240000, 300000],
            ['Aspal & Agregat', 'Agregat Kelas A (Base A)', 'm³', 260000, 330000],

            // 4. Kategori Geosintetik & Air
            ['Geosintetik & Air', 'Geotextile Woven 250gr', 'm²', 12000, 18000],
            ['Geosintetik & Air', 'Geotextile Non-Woven 150gr', 'm²', 9000, 14000],
            ['Geosintetik & Air', 'Geogrid Biaxial', 'm²', 35000, 55000],
            ['Geosintetik & Air', 'Geomembrane HDPE 1.0mm', 'm²', 45000, 65000],
            ['Geosintetik & Air', 'Kawat Bronjong (Gabion) Pabrikasi', 'Pcs', 350000, 550000],
            ['Geosintetik & Air', 'Pipa HDPE PN-10 2 inch', 'Meter', 35000, 50000],
            ['Geosintetik & Air', 'Pipa PVC AW 4 inch', 'Batang', 280000, 350000],
            ['Geosintetik & Air', 'Waterstop PVC 250mm', 'Meter', 75000, 110000],

            // 5. Kategori Finishing & Marka
            ['Finishing & Marka', 'Cat Marka Thermoplastic', 'Kg', 22000, 30000],
            ['Finishing & Marka', 'Glass Bead (Reflektor Marka)', 'Kg', 28000, 40000],
            ['Finishing & Marka', 'Elastomeric Bearing Pad (Karet Jembatan)', 'Pcs', 450000, 1500000],
            ['Finishing & Marka', 'Papan Bekisting (Phenolic 18mm)', 'Lbr', 250000, 380000],
            ['Finishing & Marka', 'Kayu Glugu/Kaso untuk Perancah', 'Batang', 25000, 45000],
            ['Finishing & Marka', 'Minyak Bekisting', 'Liter', 25000, 35000],
            ['Finishing & Marka', 'Curing Compound (Pencegah Retak)', 'Liter', 45000, 65000],
            ['Finishing & Marka', 'Epoxy Grouting (Sika Grout)', 'Kg', 15000, 25000],
            ['Finishing & Marka', 'Tiang Lampu PJU Galvanis 9m', 'Set', 4500000, 6500000],
            ['Finishing & Marka', 'Rambu Lalu Lintas (Reflective)', 'Pcs', 450000, 750000],
            ['Finishing & Marka', 'Mata Kucing (Road Stud) Aluminium', 'Pcs', 85000, 125000],
            ['Finishing & Marka', 'Expansion Joint Jembatan', 'Meter', 2500000, 5000000],

            // 6. Infrastruktur Khusus
            ['Infrastruktur Khusus', 'Bentonite (Untuk Pengeboran)', 'Kg', 3500, 5000],
            ['Infrastruktur Khusus', 'Pipa Sub-Drain (Perforated)', 'Meter', 85000, 120000],
            ['Infrastruktur Khusus', 'Manhole Cover Cast Iron', 'Set', 1500000, 3500000],
            ['Infrastruktur Khusus', 'Drip Irrigation Pipe', 'Meter', 8000, 15000],
            ['Infrastruktur Khusus', 'Solar Cell PJU (All in One)', 'Unit', 6000000, 9000000],
            ['Infrastruktur Khusus', 'Welded Beam (Balok Las)', 'Kg', 18500, 21000],
            ['Infrastruktur Khusus', 'Batu Boulder (Gajah)', 'm³', 450000, 650000],
            ['Infrastruktur Khusus', 'Anchor Bolt (M24 - M30)', 'Pcs', 85000, 150000],
            ['Infrastruktur Khusus', 'Floor Hardener (Powder)', 'Kg', 6000, 10000],
            ['Infrastruktur Khusus', 'Polyurethane (PU) Sealant', 'Tube', 120000, 180000],
        ];

        foreach ($data as $item) {
            MaterialPrice::create([
                'category' => $item[0],
                'name' => $item[1],
                'unit' => $item[2],
                'min_price' => $item[3],
                'max_price' => $item[4],
            ]);
        }
    }
}
