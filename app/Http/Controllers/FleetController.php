<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function index()
    {
        $fleets = Fleet::latest()->get();
        $activeCount = $fleets->where('status', 'Operational')->count();
        $totalCount = $fleets->count();
        $fleetHealth = $totalCount > 0 ? ($activeCount / $totalCount) * 100 : 0;

        return view('dashboard.armada.index', compact('fleets', 'activeCount', 'fleetHealth'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial_plate' => 'required|string|unique:fleets,serial_plate',
            'type' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'usage_value' => 'required|numeric|min:0',
            'usage_unit' => 'required|string'
        ]);

        Fleet::create($validated);

        return redirect()->back()->with('success', 'Asset initialized and registered to Fleet Master. Unit: ' . $validated['serial_plate']);
    }

    public function update(Request $request, $id)
    {
        $fleet = Fleet::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'serial_plate' => 'required|string|unique:fleets,serial_plate,' . $id,
            'type' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'usage_value' => 'required|numeric|min:0',
            'usage_unit' => 'required|string'
        ]);

        $fleet->update($validated);

        return redirect()->back()->with('success', 'Fleet unit ' . $fleet->serial_plate . ' updated successfully.');
    }

    public function destroy($id)
    {
        $fleet = Fleet::findOrFail($id);
        $plate = $fleet->serial_plate;
        $fleet->delete();

        return redirect()->back()->with('success', 'Asset ' . $plate . ' decommissioned from Fleet Master.');
    }
}
