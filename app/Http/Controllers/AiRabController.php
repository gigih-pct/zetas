<?php

namespace App\Http\Controllers;

use App\Models\MaterialPrice;
use App\Models\Worker;
use App\Models\Fleet;
use App\Models\RabEstimation;
use App\Services\GeminiService;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AiRabController extends Controller
{
    protected GeminiService $gemini;

    public function __construct(GeminiService $gemini)
    {
        $this->gemini = $gemini;
    }

    /**
     * Calculate RAB using Gemini AI.
     */
    public function calculate(Request $request)
    {
        $request->validate([
            'building_type' => 'required|string',
            'building_area' => 'required|numeric',
            'quality_level' => 'required|string',
            'location' => 'required|string',
            'region_id' => 'nullable|exists:regions,id',
        ]);

        // Get Regional Data
        $region = null;
        if ($request->region_id) {
            $region = Region::find($request->region_id);
        } else {
            // Default to Jogja if location mentions it
            if (stripos($request->location, 'yogyakarta') !== false || stripos($request->location, 'jogja') !== false) {
                $region = Region::where('name', 'DI Yogyakarta')->first();
            }
        }

        // 1. Gather ALL Material Prices and Workers for real-time accuracy
        $materials = MaterialPrice::all(['category', 'name', 'unit', 'min_price']);
        
        // Apply multipliers if region exists
        if ($region) {
            $materials = $materials->map(function($m) use ($region) {
                $m->min_price = $m->min_price * $region->material_multiplier;
                return $m;
            });
        }

        $workers = Worker::select('position')->distinct()->get();
        $fleets = Fleet::all(['name', 'type']);

        // 2. Build Prompt
        $prompt = $this->buildPrompt($request->all(), $materials, $workers, $fleets, $region);

        try {
            // 3. Call Gemini
            $response = $this->gemini->generateRab($prompt);

            return response()->json([
                'status' => 'success',
                'data' => $response,
                'source' => 'ai'
            ]);
        } catch (\Exception $e) {
            Log::warning('Gemini Error, falling back to dummy: ' . $e->getMessage());
            
            // Fallback to Dummy Data
            $dummyResponse = $this->getDummyRab($request->all());
            
            return response()->json([
                'status' => 'success',
                'data' => $dummyResponse,
                'source' => 'fallback',
                'warning' => 'AI sedang sibuk, menampilkan estimasi standar.'
            ]);
        }
    }

    /**
     * Generate a realistic dummy RAB breakdown if AI fails.
     */
    private function getDummyRab(array $input): array
    {
        $area = $input['building_area'];
        $qualityMultiplier = match($input['quality_level']) {
            'Premium (Heavy Duty)' => 1.5,
            'Ekonomis' => 0.8,
            default => 1.0,
        };

        $basePrice = 4500000; // Harga dasar per m2
        $totalBudget = $area * $basePrice * $qualityMultiplier;

        return [
            'items' => [
                ['no' => 1, 'category' => 'Persiapan', 'description' => 'Penyediaan Direksi Keet & Pembersihan Lahan', 'unit' => 'Ls', 'volume' => 1, 'unit_price' => $totalBudget * 0.02, 'total_price' => $totalBudget * 0.02],
                ['no' => 2, 'category' => 'Beton & Semen', 'description' => 'Semen Portland (OPC) 50kg', 'unit' => 'Sak', 'volume' => $area * 0.8, 'unit_price' => 65000 * $qualityMultiplier, 'total_price' => ($area * 0.8) * (65000 * $qualityMultiplier)],
                ['no' => 3, 'category' => 'Beton & Semen', 'description' => 'Pasir Merapi Progo (Kualitas Jogja)', 'unit' => 'm3', 'volume' => $area * 0.15, 'unit_price' => 220000, 'total_price' => ($area * 0.15) * 220000],
                ['no' => 4, 'category' => 'Batu & Bata', 'description' => 'Batu Bata Press Godean (Kualitas Jogja)', 'unit' => 'Bh', 'volume' => $area * 70, 'unit_price' => 1100, 'total_price' => ($area * 70) * 1100],
                ['no' => 5, 'category' => 'Besi & Baja', 'description' => 'Besi Beton Polos diameter 10mm (U-24)', 'unit' => 'Btg', 'volume' => $area * 0.5, 'unit_price' => 85000 * $qualityMultiplier, 'total_price' => ($area * 0.5) * (85000 * $qualityMultiplier)],
                ['no' => 6, 'category' => 'Kayu & Kusen', 'description' => 'Kusen Kayu Kampar / Jati (Sesuai Kualitas)', 'unit' => 'Set', 'volume' => floor($area / 20), 'unit_price' => 1500000 * $qualityMultiplier, 'total_price' => floor($area / 20) * (1500000 * $qualityMultiplier)],
            ],
            'grand_total' => $totalBudget,
            'land_reference' => 'Harga Tanah Yogyakarta: Rp 3.500.000 / m2',
            'notes' => 'Sistem menggunakan fallback data lokal (Yogyakarta) karena kuota AI Gemini Anda sedang penuh/terbatas.'
        ];
    }

    /**
     * Save the AI generated RAB result to the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'nullable|string',
            'building_type' => 'required|string',
            'building_area' => 'required|numeric',
            'quality_level' => 'required|string',
            'location' => 'required|string',
            'data_breakdown' => 'required|array',
            'total_budget' => 'required|numeric',
        ]);

        $estimation = RabEstimation::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'RAB berhasil disimpan ke database.',
            'id' => $estimation->id
        ]);
    }

    /**
     * Construct a specialized prompt for Gemini with precise database context.
     */
    private function buildPrompt(array $input, $materials, $workers, $fleets, $region = null): string
    {
        $materialsContext = $materials->map(fn($m) => "- {$m->name} ({$m->unit}): Rp" . number_format($m->min_price, 0, ',', '.'))->implode("\n");
        $workersContext = $workers->pluck('position')->implode(', ');

        $landRefNote = "";
        if ($region && $region->land_price_ref > 0) {
            $landPriceTotal = $region->land_price_ref * $input['building_area'];
            $landRefNote = "\nREFERENSI HARGA TANAH (TERPISAH):
            - Harga Tanah di {$region->name}: Rp " . number_format($region->land_price_ref, 0, ',', '.') . "/m2
            - Estimasi Total Harga Tanah: Rp " . number_format($landPriceTotal, 0, ',', '.') . "
            (PENTING: JANGAN tambahkan harga tanah ini ke Grand Total RAB Konstruksi. Tampilkan hanya sebagai catatan/informasi terpisah).";
        }

        return "Anda adalah System Estimator RAB Progresif. Tugas Anda adalah menghitung RAB Konstruksi berdasar data REAL-TIME dari database kami.

        DATA INPUT USER:
        - Tipe Proyek: {$input['building_type']}
        - Luas: {$input['building_area']} m2
        - Target Kualitas: {$input['quality_level']}
        - Lokasi: {$input['location']}
        " . ($region ? "- Wilayah: {$region->name}" : "") . "

        {$landRefNote}

        REFERENSI HARGA BAHAN DARI DATABASE KAMI (WAJIB DIGUNAKAN):
        {$materialsContext}

        REFERENSI TENAGA KERJA:
        {$workersContext}

        INSTRUKSI KHUSUS:
        1. Gunakan HARGA SATUAN dari referensi di atas. Jika proyek di Yogyakarta, prioritaskan material lokal (Pasir Merapi, Batu Kali).
        2. Hitung volume pekerjaan yang realistis untuk luas {$input['building_area']} m2.
        3. FOKUS UTAMA pada rincian BAHAN BANGUNAN.
        4. Output HARUS dalam format JSON VALID tanpa teks tambahan.
        5. Struktur JSON:
        {
            \"items\": [
                {
                    \"no\": 1,
                    \"category\": \"Kategori Pekerjaan\",
                    \"description\": \"Nama spesifik pekerjaan\",
                    \"unit\": \"m2/m3/Kg/Ls\",
                    \"volume\": angka_volume,
                    \"unit_price\": harga_satuan,
                    \"total_price\": volume * harga_satuan
                }
            ],
            \"grand_total\": total_seluruh_pekerjaan (TIDAK TERMASUK HARGA TANAH),
            \"land_reference\": \"Informasi harga tanah di wilayah ini\",
            \"notes\": \"Analisis rincian material dan kesesuaian harga wilayah\"
        }";
    }
}
