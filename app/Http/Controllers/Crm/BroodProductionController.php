<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\BroodProduction;
use App\Models\Hatchery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BroodProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $broodProductions = BroodProduction::latest()->paginate(15);
        
        return view('crm.brood-productions.index', compact('broodProductions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = BroodProduction::SPECIES;
        $broodTypes = BroodProduction::BROOD_TYPES;
        $breedingStatuses = BroodProduction::BREEDING_STATUSES;
        $hatcheries = Hatchery::pluck('hatchery_name', 'hatchery_name')->toArray();
        
        return view('crm.brood-productions.create', compact('species', 'broodTypes', 'breedingStatuses', 'hatcheries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hatchery_name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'brood_type' => 'required|string|max:255',
            'brood_count' => 'required|integer|min:1',
            'avg_weight' => 'required|numeric|min:0',
            'total_weight' => 'required|numeric|min:0',
            'breeding_status' => 'required|string|max:255',
            'spawning_date' => 'nullable|date',
            'eggs_collected' => 'nullable|integer|min:0',
            'fry_produced' => 'nullable|integer|min:0',
            'survival_rate' => 'nullable|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'recorded_by' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $data['recorded_by'] = Auth::user()->name ?? $request->recorded_by;

        $broodProduction = BroodProduction::create($data);

        // Auto-calculate survival rate if eggs and fry data provided
        if ($broodProduction->eggs_collected && $broodProduction->fry_produced) {
            $broodProduction->updateSurvivalRate();
        }

        return redirect()->route('crm.brood-productions.index')
            ->with('success', 'Brood production record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BroodProduction $broodProduction)
    {
        return view('crm.brood-productions.show', compact('broodProduction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BroodProduction $broodProduction)
    {
        $species = BroodProduction::SPECIES;
        $broodTypes = BroodProduction::BROOD_TYPES;
        $breedingStatuses = BroodProduction::BREEDING_STATUSES;
        $hatcheries = Hatchery::pluck('hatchery_name', 'hatchery_name')->toArray();
        
        return view('crm.brood-productions.edit', compact('broodProduction', 'species', 'broodTypes', 'breedingStatuses', 'hatcheries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BroodProduction $broodProduction)
    {
        $request->validate([
            'hatchery_name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'brood_type' => 'required|string|max:255',
            'brood_count' => 'required|integer|min:1',
            'avg_weight' => 'required|numeric|min:0',
            'total_weight' => 'required|numeric|min:0',
            'breeding_status' => 'required|string|max:255',
            'spawning_date' => 'nullable|date',
            'eggs_collected' => 'nullable|integer|min:0',
            'fry_produced' => 'nullable|integer|min:0',
            'survival_rate' => 'nullable|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'recorded_by' => 'required|string|max:255'
        ]);

        $data = $request->all();
        $data['recorded_by'] = Auth::user()->name ?? $request->recorded_by;

        $broodProduction->update($data);

        // Auto-calculate survival rate if eggs and fry data provided
        if ($broodProduction->eggs_collected && $broodProduction->fry_produced) {
            $broodProduction->updateSurvivalRate();
        }

        return redirect()->route('crm.brood-productions.index')
            ->with('success', 'Brood production record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BroodProduction $broodProduction)
    {
        $broodProduction->delete();

        return redirect()->route('crm.brood-productions.index')
            ->with('success', 'Brood production record deleted successfully!');
    }
}
