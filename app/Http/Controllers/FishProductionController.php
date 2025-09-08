<?php

namespace App\Http\Controllers;

use App\Models\FishProduction;
use Illuminate\Http\Request;

class FishProductionController extends Controller
{
    public function index()
    {
        $fishProductions = FishProduction::latest()->paginate(10);
        return view('fish-productions.index', compact('fishProductions'));
    }

    public function create()
    {
        $species = FishProduction::SPECIES;
        $weightRates = FishProduction::WEIGHT_RATES;
        return view('fish-productions.create', compact('species', 'weightRates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.species' => 'required|in:Rohu,Mori,Thalia,Grass Carp,Gulfam,Pangasius,Kalbans,Seabass,Mahseer,Silver Carp,Bighead,Carp,Clarias,Mullee,Khagga,Saul,Singharee,Tilapia,Trash and Weed Fish,Trout,Jhalli,Other',
            'entries.*.weight_range' => 'required|string',
            'entries.*.rate' => 'nullable|numeric|min:0',
            'entries.*.fish_qty' => 'required|integer|min:0',
            'entries.*.total_weight' => 'required|numeric|min:0',
            'entries.*.avg_weight' => 'nullable|numeric|min:0',
        ], [
            'entries.required' => 'At least one entry is required.',
            'entries.array' => 'Entries must be in array format.',
            'entries.min' => 'At least one entry is required.',
            'entries.*.species.required' => 'Species selection is required for all entries.',
            'entries.*.fish_qty.required' => 'Fish quantity is required for all entries.',
            'entries.*.fish_qty.integer' => 'Fish quantity must be a whole number.',
            'entries.*.fish_qty.min' => 'Fish quantity cannot be negative.',
            'entries.*.total_weight.required' => 'Total weight is required for all entries.',
            'entries.*.total_weight.numeric' => 'Total weight must be a number.',
            'entries.*.total_weight.min' => 'Total weight cannot be negative.',
            'entries.*.avg_weight.numeric' => 'Average weight must be a number.',
            'entries.*.avg_weight.min' => 'Average weight cannot be negative.',
            'entries.*.rate.numeric' => 'Rate must be a number.',
            'entries.*.rate.min' => 'Rate cannot be negative.',
        ]);

        try {
            $createdCount = 0;
            foreach ($request->entries as $entry) {
                FishProduction::create([
                    'species' => $entry['species'],
                    'weight_range' => $entry['weight_range'],
                    'rate' => $entry['rate'] ?? null,
                    'fish_qty' => $entry['fish_qty'],
                    'total_weight' => $entry['total_weight'],
                    'avg_weight' => $entry['avg_weight'] ?? null,
                ]);
                $createdCount++;
            }

            $message = $createdCount === 1 
                ? 'Fish production record created successfully!' 
                : "{$createdCount} fish production records created successfully!";

            return redirect()->route('cms.fish-productions.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating fish production records: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $fishProduction = FishProduction::findOrFail($id);
        return view('fish-productions.show', compact('fishProduction'));
    }

    public function edit(string $id)
    {
        $fishProduction = FishProduction::findOrFail($id);
        $species = FishProduction::SPECIES;
        $weightRates = FishProduction::WEIGHT_RATES;
        return view('fish-productions.edit', compact('fishProduction', 'species', 'weightRates'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|in:Rohu,Mori,Thalia,Grass Carp,Gulfam,Pangasius,Kalbans,Seabass,Mahseer,Silver Carp,Bighead,Carp,Clarias,Mullee,Khagga,Saul,Singharee,Tilapia,Trash and Weed Fish,Trout,Jhalli,Other',
            'weight_range' => 'required|string',
            'rate' => 'nullable|numeric|min:0',
            'fish_qty' => 'required|integer|min:0',
            'total_weight' => 'required|numeric|min:0',
            'avg_weight' => 'nullable|numeric|min:0',
        ], [
            'species.required' => 'Species selection is required.',
            'weight_range.required' => 'Weight range is required.',
            'fish_qty.required' => 'Fish quantity is required.',
            'fish_qty.integer' => 'Fish quantity must be a whole number.',
            'fish_qty.min' => 'Fish quantity cannot be negative.',
            'total_weight.required' => 'Total weight is required.',
            'total_weight.numeric' => 'Total weight must be a number.',
            'total_weight.min' => 'Total weight cannot be negative.',
            'avg_weight.numeric' => 'Average weight must be a number.',
            'avg_weight.min' => 'Average weight cannot be negative.',
            'rate.numeric' => 'Rate must be a number.',
            'rate.min' => 'Rate cannot be negative.',
        ]);

        try {
            $fishProduction = FishProduction::findOrFail($id);
            $fishProduction->update($request->all());
            return redirect()->route('cms.fish-productions.index')
                ->with('success', 'Fish production record updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating fish production record: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $fishProduction = FishProduction::findOrFail($id);
            $fishProduction->delete();
            return redirect()->route('cms.fish-productions.index')
                ->with('success', 'Fish production record deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting fish production record: ' . $e->getMessage());
        }
    }
}
