<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Worker;
use App\Models\Fleet;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'workers' => Worker::count(),
            'fleets' => Fleet::where('status', 'Operational')->count(),
        ];

        $recentProjects = Project::latest()->take(3)->get();

        return view('welcome', compact('stats', 'recentProjects'));
    }
}
