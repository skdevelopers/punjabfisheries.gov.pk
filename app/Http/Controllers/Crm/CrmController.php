<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\FishSelling;
use App\Models\SeedSelling;
use App\Models\PublicStocking;
use App\Models\PrivateStocking;
use App\Models\Hatchery;
use App\Models\Target;
use App\Models\BroodProduction;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index()
    {
        // Get statistics for CRM dashboard
        $totalHatcheries = Hatchery::count();
        $totalFishSellings = FishSelling::count();
        $totalSeedSellings = SeedSelling::count();
        $totalBroodProductions = BroodProduction::count();
        $totalPublicStockings = PublicStocking::count();
        $totalPrivateStockings = PrivateStocking::count();
        $totalTargets = Target::count();
        $activeTargets = Target::active()->count();
        $completedTargets = Target::completed()->count();
        $overdueTargets = Target::overdue()->count();
        
        // Get recent activities
        $recentHatcheries = Hatchery::latest()->take(5)->get();
        $recentFishSellings = FishSelling::latest()->take(5)->get();
        $recentSeedSellings = SeedSelling::latest()->take(5)->get();
        $recentBroodProductions = BroodProduction::latest()->take(5)->get();
        $recentPublicStockings = PublicStocking::latest()->take(5)->get();
        $recentPrivateStockings = PrivateStocking::latest()->take(5)->get();
        $recentTargets = Target::latest()->take(5)->get();

        return view('crm.index', compact(
            'totalHatcheries',
            'totalFishSellings',
            'totalSeedSellings',
            'totalBroodProductions',
            'totalPublicStockings',
            'totalPrivateStockings',
            'totalTargets',
            'activeTargets',
            'completedTargets',
            'overdueTargets',
            'recentHatcheries',
            'recentFishSellings',
            'recentSeedSellings',
            'recentBroodProductions',
            'recentPublicStockings',
            'recentPrivateStockings',
            'recentTargets'
        ));
    }
}
