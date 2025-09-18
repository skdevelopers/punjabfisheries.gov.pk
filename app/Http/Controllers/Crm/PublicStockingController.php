<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\PublicStocking;
use Illuminate\Http\Request;

class PublicStockingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicStockings = PublicStocking::latest()->paginate(10);
        return view('crm.public-stockings.index', compact('publicStockings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $species = PublicStocking::SPECIES;
        return view('crm.public-stockings.create', compact('species'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.species' => 'required|string',
            'entries.*.weight' => 'required|numeric|min:0',
            'entries.*.water_body_name' => 'required|string|max:255',
        ], [
            'entries.required' => 'At least one entry is required.',
            'entries.array' => 'Entries must be in array format.',
            'entries.min' => 'At least one entry is required.',
            'entries.*.species.required' => 'Species selection is required for all entries.',
            'entries.*.weight.required' => 'Weight is required for all entries.',
            'entries.*.weight.numeric' => 'Weight must be a number.',
            'entries.*.weight.min' => 'Weight cannot be negative.',
            'entries.*.water_body_name.required' => 'Water body name is required for all entries.',
            'entries.*.water_body_name.max' => 'Water body name cannot exceed 255 characters.',
        ]);

        try {
            $createdCount = 0;
            foreach ($request->entries as $entry) {
                PublicStocking::create([
                    'species' => $entry['species'],
                    'no' => $entry['weight'], // Using weight value for no field
                    'water_body_name' => $entry['water_body_name'],
                ]);
                $createdCount++;
            }

            $message = $createdCount === 1 
                ? 'Public stocking record created successfully!' 
                : "{$createdCount} public stocking records created successfully!";

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => $message]);
            }

            return redirect()->route('crm.public-stockings.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating public stocking records: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publicStocking = PublicStocking::findOrFail($id);
        return view('crm.public-stockings.show', compact('publicStocking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publicStocking = PublicStocking::findOrFail($id);
        $species = PublicStocking::SPECIES;
        return view('crm.public-stockings.edit', compact('publicStocking', 'species'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|string',
            'no' => 'required|integer|min:1',
            'water_body_name' => 'required|string|max:255',
        ], [
            'species.required' => 'Species selection is required.',
            'no.required' => 'Number is required.',
            'no.integer' => 'Number must be an integer.',
            'no.min' => 'Number must be at least 1.',
            'water_body_name.required' => 'Water body name is required.',
            'water_body_name.max' => 'Water body name cannot exceed 255 characters.',
        ]);

        try {
            $publicStocking = PublicStocking::findOrFail($id);
            $publicStocking->update($request->all());
            return redirect()->route('crm.public-stockings.index')
                ->with('success', 'Public stocking record updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating public stocking record: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $publicStocking = PublicStocking::findOrFail($id);
            $publicStocking->delete();
            
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Public stocking record deleted successfully!']);
            }
            
            return redirect()->route('crm.public-stockings.index')
                ->with('success', 'Public stocking record deleted successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Error deleting public stocking record: ' . $e->getMessage()], 500);
            }
            
            return back()->with('error', 'Error deleting public stocking record: ' . $e->getMessage());
        }
    }
}
