<?php

namespace App\Http\Controllers;

use App\Models\SeedProduction;
use Illuminate\Http\Request;

class SeedProductionController extends Controller
{
    public function index()
    {
        $seedProductions = SeedProduction::latest()->paginate(10);
        return view('seed-productions.index', compact('seedProductions'));
    }

    public function create()
    {
        $species = SeedProduction::SPECIES;
        $sizeRates = SeedProduction::SIZE_RATES;
        return view('seed-productions.create', compact('species', 'sizeRates'));
    }

    public function store(Request $request)
    {
        // Debug: Log the incoming request data
        \Log::info('Seed Production Store Request:', $request->all());
        
        $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.species' => 'required|string',
            'entries.*.size_range' => 'required|string',
            'entries.*.rate' => 'nullable|numeric|min:0',
            'entries.*.quantity' => 'required|numeric|min:0',
            'entries.*.total_amount' => 'nullable|numeric|min:0',
        ], [
            'entries.required' => 'At least one entry is required.',
            'entries.array' => 'Entries must be in array format.',
            'entries.min' => 'At least one entry is required.',
            'entries.*.species.required' => 'Species selection is required for all entries.',
            'entries.*.size_range.required' => 'Size range is required for all entries.',
            'entries.*.quantity.required' => 'Quantity is required for all entries.',
            'entries.*.quantity.numeric' => 'Quantity must be a number.',
            'entries.*.quantity.min' => 'Quantity cannot be negative.',
            'entries.*.rate.numeric' => 'Rate must be a number.',
            'entries.*.rate.min' => 'Rate cannot be negative.',
            'entries.*.total_amount.numeric' => 'Total amount must be a number.',
            'entries.*.total_amount.min' => 'Total amount cannot be negative.',
        ]);

        try {
            $createdCount = 0;
            foreach ($request->entries as $entry) {
                SeedProduction::create([
                    'species' => $entry['species'],
                    'size_range' => $entry['size_range'],
                    'rate' => $entry['rate'] ?? null,
                    'quantity' => $entry['quantity'],
                    'total_amount' => $entry['total_amount'] ?? null,
                ]);
                $createdCount++;
            }

            $message = $createdCount === 1 
                ? 'Seed production record created successfully!' 
                : "{$createdCount} seed production records created successfully!";

            return redirect()->route('cms.seed-productions.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating seed production records: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $seedProduction = SeedProduction::findOrFail($id);
        return view('seed-productions.show', compact('seedProduction'));
    }

    public function edit(string $id)
    {
        $seedProduction = SeedProduction::findOrFail($id);
        $species = SeedProduction::SPECIES;
        $sizeRates = SeedProduction::SIZE_RATES;
        return view('seed-productions.edit', compact('seedProduction', 'species', 'sizeRates'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|string',
            'size_range' => 'required|string',
            'rate' => 'nullable|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
        ], [
            'species.required' => 'Species selection is required.',
            'size_range.required' => 'Size range is required.',
            'quantity.required' => 'Quantity is required.',
            'quantity.numeric' => 'Quantity must be a number.',
            'quantity.min' => 'Quantity cannot be negative.',
            'rate.numeric' => 'Rate must be a number.',
            'rate.min' => 'Rate cannot be negative.',
            'total_amount.numeric' => 'Total amount must be a number.',
            'total_amount.min' => 'Total amount cannot be negative.',
        ]);

        try {
            $seedProduction = SeedProduction::findOrFail($id);
            $seedProduction->update($request->all());
            return redirect()->route('cms.seed-productions.index')
                ->with('success', 'Seed production record updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating seed production record: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $seedProduction = SeedProduction::findOrFail($id);
            $seedProduction->delete();
            return redirect()->route('cms.seed-productions.index')
                ->with('success', 'Seed production record deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting seed production record: ' . $e->getMessage());
        }
    }
}
