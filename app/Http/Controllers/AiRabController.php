<?php

namespace App\Http\Controllers;

use App\Models\MaterialPrice;
use App\Models\Worker;
use App\Models\Fleet;
use App\Models\RabEstimation;
use App\Services\GeminiService;
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
        ]);

        // 1. Gather ALL Material Prices and Workers for real-time accuracy
        $materials = MaterialPrice::all(['category', 'name', 'unit', 'min_price']);
        $workers = Worker::select('position')->distinct()->get();
        $fleets = Fleet::all(['name', 'type']);

        // 2. Build Prompt
        $prompt = $this->buildPrompt($request->all(), $materials, $workers, $fleets);

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
                [
                    'no' => 1,
                    'category' => 'Persiapan',
                    'description' => 'Pekerjaan Persiapan & Lahan',
                    'unit' => 'Ls',
                    'volume' => 1,
                    'unit_price' => $totalBudget * 0.05,
                    'total_price' => $totalBudget * 0.05
                ],
                [
                    'no' => 2,
                    'category' => 'Struktur',
                    'description' => 'Pekerjaan Struktur & Pondasi',
                    'unit' => 'm3',
                    'volume' => $area * 0.5,
                    'unit_price' => 1200000 * $qualityMultiplier,
                    'total_price' => $totalBudget * 0.45
                ],
                [
                    'no' => 3,
                    'category' => 'Finishing',
                    'description' => 'Pekerjaan Arsitektur & Finishing',
                    'unit' => 'm2',
                    'volume' => $area,
                    'unit_price' => 2000000 * $qualityMultiplier,
                    'total_price' => $totalBudget * 0.5
                ]
            ],
            'grand_total' => $totalBudget,
            'notes' => 'Estimasi dihitung menggunakan algoritma standar (AI sedang offline).'
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
    private function buildPrompt(array $input, $materials, $workers, $fleets): string
    {
        $materialsContext = $materials->map(fn($m) => "- {$m->name} ({$m->unit}): Rp" . number_format($m->min_price, 0, ',', '.'))->implode("\n");
        $workersContext = $workers->pluck('position')->implode(', ');

        return "Anda adalah System Estimator RAB Progresif. Tugas Anda adalah menghitung RAB Konstruksi berdasar data REAL-TIME dari database kami.

        DATA INPUT USER:
        - Tipe Proyek: {$input['building_type']}
        - Luas: {$input['building_area']} m2
        - Target Kualitas: {$input['quality_level']}
        - Lokasi: {$input['location']}

        REFERENSI HARGA BAHAN DARI DATABASE KAMI (WAJIB DIGUNAKAN):
        {$materialsContext}

        REFERENSI TENAGA KERJA:
        {$workersContext}

        INSTRUKSI KHUSUS:
        1. Gunakan HARGA SATUAN dari referensi di atas. Jika bahan tidak ada di daftar, gunakan estimasi pasar yang logis.
        2. Hitung volume pekerjaan yang realistis untuk luas {$input['building_area']} m2.
        3. Output HARUS dalam format JSON VALID tanpa teks tambahan.
        4. Struktur JSON:
        {
            \"items\": [
                {
                    \"no\": 1,
                    \"category\": \"Kategori Pekerjaan (misal: Beton, Dinding)\",
                    \"description\": \"Nama spesifik pekerjaan\",
                    \"unit\": \"m2/m3/Kg/Ls\",
                    \"volume\": angka_volume,
                    \"unit_price\": harga_satuan_dari_database,
                    \"total_price\": volume * harga_satuan
                }
            ],
            \"grand_total\": total_seluruh_pekerjaan,
            \"notes\": \"Analisis singkat mengapa estimasi ini akurat berdasar data database\"
        }";
    }
}
