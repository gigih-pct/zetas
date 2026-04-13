<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Inventory;
use App\Models\Worker;
use App\Models\Fleet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Project Pulse
        $totalProjects = Project::count();
        $activeProjects = Project::where('status', 'Active')->count();
        $latestProjects = Project::latest()->take(2)->get();

        // 2. Resource Flow (Inventory Valuation)
        $inventory = Inventory::all();
        $totalValuation = $inventory->sum(function($item) {
            return $item->stock * $item->unit_price;
        });

        // 3. Fleet Intelligence
        $totalFleet = Fleet::count();
        $operationalFleet = Fleet::where('status', 'Operational')->count();
        $fleetHealth = $totalFleet > 0 ? ($operationalFleet / $totalFleet) * 100 : 0;

        // 4. Labor Force
        $workerCount = Worker::count();

        // 5. Intelligence Feed (Low Stock)
        $lowStockItems = Inventory::where('stock', '<', 20)->latest()->take(3)->get();

        return view('dashboard.beranda.index', compact(
            'totalProjects', 
            'activeProjects', 
            'latestProjects', 
            'totalValuation', 
            'totalFleet', 
            'operationalFleet', 
            'fleetHealth', 
            'workerCount', 
            'lowStockItems'
        ));
    }
}
