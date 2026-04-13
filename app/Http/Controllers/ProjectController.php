<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('dashboard.proyek.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'sector' => 'required|string',
            'node_id' => 'required|string|unique:projects,node_id',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string',
            'priority' => 'required|string',
            'milestone_name' => 'required|string',
            'milestone_date' => 'nullable|date',
            'milestone_status' => 'required|string',
            'team_size' => 'required|integer|min:1',
            'is_highlighted' => 'boolean'
        ]);

        $validated['is_highlighted'] = $request->has('is_highlighted');

        Project::create($validated);

        return redirect()->back()->with('success', 'Project initialized successfully. Node added to Architectural Log.');
    }
}
