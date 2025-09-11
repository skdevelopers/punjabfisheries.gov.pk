<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\PrivateStocking;
use Illuminate\Http\Request;

class PrivateStockingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privateStockings = PrivateStocking::latest()->paginate(10);
        return view('crm.private-stockings.index', compact('privateStockings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = PrivateStocking::SPECIES;
        return view('crm.private-stockings.create', compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.species' => 'required|string',
            'entries.*.no' => 'required|integer|min:1',
            'entries.*.income_from_fish_seed' => 'required|numeric|min:0',
        ], [
            'entries.required' => 'At least one entry is required.',
            'entries.array' => 'Entries must be in array format.',
            'entries.min' => 'At least one entry is required.',
            'entries.*.species.required' => 'Species selection is required for all entries.',
            'entries.*.no.required' => 'Number is required for all entries.',
            'entries.*.no.integer' => 'Number must be an integer.',
            'entries.*.no.min' => 'Number must be at least 1.',
            'entries.*.income_from_fish_seed.required' => 'Income from fish seed is required for all entries.',
            'entries.*.income_from_fish_seed.numeric' => 'Income from fish seed must be a number.',
            'entries.*.income_from_fish_seed.min' => 'Income from fish seed cannot be negative.',
        ]);

        try {
            $createdCount = 0;
            foreach ($request->entries as $entry) {
                PrivateStocking::create([
                    'species' => $entry['species'],
                    'no' => $entry['no'],
                    'income_from_fish_seed' => $entry['income_from_fish_seed'],
                ]);
                $createdCount++;
            }

            $message = $createdCount === 1 
                ? 'Private stocking record created successfully!' 
                : "{$createdCount} private stocking records created successfully!";

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => $message]);
            }

            return redirect()->route('crm.private-stockings.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating private stocking records: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $privateStocking = PrivateStocking::findOrFail($id);
        return view('crm.private-stockings.show', compact('privateStocking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $privateStocking = PrivateStocking::findOrFail($id);
        $species = PrivateStocking::SPECIES;
        return view('crm.private-stockings.edit', compact('privateStocking', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|string',
            'no' => 'required|integer|min:1',
            'income_from_fish_seed' => 'required|numeric|min:0',
        ], [
            'species.required' => 'Species selection is required.',
            'no.required' => 'Number is required.',
            'no.integer' => 'Number must be an integer.',
            'no.min' => 'Number must be at least 1.',
            'income_from_fish_seed.required' => 'Income from fish seed is required.',
            'income_from_fish_seed.numeric' => 'Income from fish seed must be a number.',
            'income_from_fish_seed.min' => 'Income from fish seed cannot be negative.',
        ]);

        try {
            $privateStocking = PrivateStocking::findOrFail($id);
            $privateStocking->update($request->all());
            return redirect()->route('crm.private-stockings.index')
                ->with('success', 'Private stocking record updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating private stocking record: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $privateStocking = PrivateStocking::findOrFail($id);
            $privateStocking->delete();
            
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Private stocking record deleted successfully!']);
            }
            
            return redirect()->route('crm.private-stockings.index')
                ->with('success', 'Private stocking record deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Error deleting private stocking record: ' . $e->getMessage()], 500);
            }
            
            return back()->with('error', 'Error deleting private stocking record: ' . $e->getMessage());
        }
    }
}
