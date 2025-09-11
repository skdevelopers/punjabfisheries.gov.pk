<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\SeedSelling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SeedSellingController extends Controller
{
    public function index()
    {
        $seedSellings = SeedSelling::latest()->paginate(10);
        return view('crm.seed-sellings.index', compact('seedSellings'));
    }

    public function create()
    {
        $species = SeedSelling::SPECIES;
        $sizeRates = SeedSelling::SIZE_RATES;
        return view('crm.seed-sellings.create', compact('species', 'sizeRates'));
    }

    public function store(Request $request)
    {
        // Debug: Log the incoming request data
        Log::info('Seed Selling Store Request:', $request->all());
        
        $request->validate([
            'entries' => 'required|array|min:1',
            'entries.*.species' => 'required|string',
            'entries.*.main_size_option' => 'required|string',
            'entries.*.size_range' => 'nullable|string',
            'entries.*.rate' => 'nullable|numeric|min:0',
            'entries.*.quantity' => 'required|numeric|min:0',
            'entries.*.total_amount' => 'nullable|numeric|min:0',
        ], [
            'entries.required' => 'At least one entry is required.',
            'entries.array' => 'Entries must be in array format.',
            'entries.min' => 'At least one entry is required.',
            'entries.*.species.required' => 'Species selection is required for all entries.',
            'entries.*.main_size_option.required' => 'Size option is required for all entries.',
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
                Log::info('Creating seed selling entry:', $entry);
                $seedSelling = SeedSelling::create([
                    'species' => $entry['species'],
                    'main_size_option' => $entry['main_size_option'],
                    'size_range' => $entry['size_range'] ?? null,
                    'rate' => $entry['rate'] ?? null,
                    'quantity' => $entry['quantity'],
                    'total_amount' => $entry['total_amount'] ?? null,
                ]);
                Log::info('Created seed selling with ID:', ['id' => $seedSelling->id]);
                $createdCount++;
            }

            $message = $createdCount === 1 
                ? 'Seed selling record created successfully!' 
                : "{$createdCount} seed selling records created successfully!";

            Log::info('Redirecting with success message:', ['message' => $message]);
            return redirect()->route('crm.seed-sellings.index')
                ->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Error creating seed selling records:', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return back()->withInput()
                ->with('error', 'Error creating seed selling records: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $seedSelling = SeedSelling::findOrFail($id);
        return view('crm.seed-sellings.show', compact('seedSelling'));
    }

    public function edit(string $id)
    {
        $seedSelling = SeedSelling::findOrFail($id);
        $species = SeedSelling::SPECIES;
        $sizeRates = SeedSelling::SIZE_RATES;
        return view('crm.seed-sellings.edit', compact('seedSelling', 'species', 'sizeRates'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'species' => 'required|string',
            'main_size_option' => 'required|string',
            'size_range' => 'nullable|string',
            'rate' => 'nullable|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
        ], [
            'species.required' => 'Species selection is required.',
            'main_size_option.required' => 'Size option is required.',
            'quantity.required' => 'Quantity is required.',
            'quantity.numeric' => 'Quantity must be a number.',
            'quantity.min' => 'Quantity cannot be negative.',
            'rate.numeric' => 'Rate must be a number.',
            'rate.min' => 'Rate cannot be negative.',
            'total_amount.numeric' => 'Total amount must be a number.',
            'total_amount.min' => 'Total amount cannot be negative.',
        ]);

        try {
            $seedSelling = SeedSelling::findOrFail($id);
            $seedSelling->update($request->all());
            return redirect()->route('crm.seed-sellings.index')
                ->with('success', 'Seed selling record updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating seed selling record: ' . $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $seedSelling = SeedSelling::findOrFail($id);
            $seedSelling->delete();
            return redirect()->route('crm.seed-sellings.index')
                ->with('success', 'Seed selling record deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting seed selling record: ' . $e->getMessage());
        }
    }
}
