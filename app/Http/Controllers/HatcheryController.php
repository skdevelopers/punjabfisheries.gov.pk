<?php

namespace App\Http\Controllers;

use App\Http\Requests\HatcheryRequest;
use App\Models\Hatchery;
use Illuminate\Http\Request;

class HatcheryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hatcheries = Hatchery::latest()->paginate(10);
        return view('hatcheries.index', compact('hatcheries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('hatcheries.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(HatcheryRequest $request)
    {
        try {
            $hatchery = Hatchery::create($request->validated());

            return redirect()->route('crm.hatcheries.index')
                ->with('success', 'Hatchery created successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error creating hatchery: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */

    public function show(Hatchery $hatchery)
    {
        $hatchery = Hatchery::findOrFail($hatchery);
        return view('hatcheries.show', compact('hatchery'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Hatchery $hatchery)
    {
        $hatchery = Hatchery::findOrFail($hatchery);
        return view('hatcheries.edit', compact('hatchery'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HatcheryRequest $request, Hatchery $hatchery)
    {
        try {

            $hatchery->update($request->validated());

            return redirect()->route('crm.hatcheries.index')
                ->with('success', 'Hatchery updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error updating hatchery: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Hatchery $hatchery)
    {
        try {

            $hatchery->delete();

            return redirect()->route('crm.hatcheries.index')
                ->with('success', 'Hatchery deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting hatchery: ' . $e->getMessage());
        }
    }
}
