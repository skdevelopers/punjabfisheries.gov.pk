<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\FishSelling;
use App\Models\SeedSelling;
use App\Models\PublicStocking;
use App\Models\PrivateStocking;
use App\Models\Hatchery;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index()
    {
        // Get statistics for CRM dashboard
        $totalHatcheries = Hatchery::count();
        $totalFishSellings = FishSelling::count();
        $totalSeedSellings = SeedSelling::count();
        $totalPublicStockings = PublicStocking::count();
        $totalPrivateStockings = PrivateStocking::count();
        
        // Get recent activities
        $recentHatcheries = Hatchery::latest()->take(5)->get();
        $recentFishSellings = FishSelling::latest()->take(5)->get();
        $recentSeedSellings = SeedSelling::latest()->take(5)->get();
        $recentPublicStockings = PublicStocking::latest()->take(5)->get();
        $recentPrivateStockings = PrivateStocking::latest()->take(5)->get();

        return view('crm.index', compact(
            'totalHatcheries',
            'totalFishSellings',
            'totalSeedSellings', 
            'totalPublicStockings',
            'totalPrivateStockings',
            'recentHatcheries',
            'recentFishSellings',
            'recentSeedSellings',
            'recentPublicStockings',
            'recentPrivateStockings'
        ));
    }
}
