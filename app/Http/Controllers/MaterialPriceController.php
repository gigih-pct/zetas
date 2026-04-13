<?php

namespace App\Http\Controllers;

use App\Models\MaterialPrice;
use Illuminate\Http\Request;

class MaterialPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupedMaterials = MaterialPrice::all()->groupBy('category');
        return view('dashboard.bahan.harga', compact('groupedMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
        ]);

        MaterialPrice::create($validated);

        return redirect()->route('dashboard.harga-bahan')->with('success', 'Material successfully added.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
        ]);

        $material = MaterialPrice::findOrFail($id);
        $material->update($validated);

        return redirect()->route('dashboard.harga-bahan')->with('success', 'Material successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $material = MaterialPrice::findOrFail($id);
        $material->delete();

        return redirect()->route('dashboard.harga-bahan')->with('success', 'Material successfully deleted.');
    }
}
