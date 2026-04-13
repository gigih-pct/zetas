<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::latest()->get();
        $totalValuation = $inventories->sum(function ($item) {
            return $item->stock * $item->unit_price;
        });

        return view('dashboard.bahan.index', compact('inventories', 'totalValuation'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string',
            'status' => 'required|string',
            'unit_price' => 'required|numeric|min:0'
        ]);

        Inventory::create($validated);

        return redirect()->back()->with('success', 'Material inbound protocol successful. Item registered to Warehouse Matrix.');
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string',
            'status' => 'required|string',
            'unit_price' => 'required|numeric|min:0'
        ]);

        $inventory->update($validated);

        return redirect()->back()->with('success', 'Material node updated successfully.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->back()->with('success', 'Material decommissioned and removed from Warehouse Matrix.');
    }
}
