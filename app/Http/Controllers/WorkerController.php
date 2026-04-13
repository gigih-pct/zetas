<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::latest()->get();
        $activeCount = $workers->count();
        $avgEfficiency = $workers->avg('efficiency') ?? 0;

        return view('dashboard.pekerja.index', compact('workers', 'activeCount', 'avgEfficiency'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'security_level' => 'required|string',
            'sector' => 'required|string',
            'efficiency' => 'required|integer|min:0|max:100',
            'contact' => 'nullable|string'
        ]);

        // Auto-generate registration_id
        $lastWorker = Worker::latest()->first();
        $lastId = $lastWorker ? (int) substr($lastWorker->registration_id, 6) : 0;
        $validated['registration_id'] = 'ZT-OP-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        Worker::create($validated);

        return redirect()->back()->with('success', 'Operative enlisted successfully. Registration ID: ' . $validated['registration_id']);
    }

    public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'security_level' => 'required|string',
            'sector' => 'required|string',
            'efficiency' => 'required|integer|min:0|max:100',
            'contact' => 'nullable|string'
        ]);

        $worker->update($validated);

        return redirect()->back()->with('success', 'Operative dossier ' . $worker->registration_id . ' updated successfully.');
    }

    public function destroy($id)
    {
        $worker = Worker::findOrFail($id);
        $regId = $worker->registration_id;
        $worker->delete();

        return redirect()->back()->with('success', 'Operative ' . $regId . ' decommissioned from active registry.');
    }
}
