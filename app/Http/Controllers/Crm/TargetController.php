<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Target;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $targets = Target::latest()->paginate(10);
        $stats = [
            'total' => Target::count(),
            'active' => Target::active()->count(),
            'completed' => Target::completed()->count(),
            'overdue' => Target::overdue()->count(),
        ];
        
        return view('crm.targets.index', compact('targets', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Target::TYPES;
        $categories = Target::CATEGORIES;
        $statuses = Target::STATUSES;
        $priorities = Target::PRIORITIES;
        $units = Target::UNITS;
        
        return view('crm.targets.create', compact('types', 'categories', 'statuses', 'priorities', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:' . implode(',', array_keys(Target::TYPES)),
            'category' => 'required|in:' . implode(',', array_keys(Target::CATEGORIES)),
            'target_value' => 'required|numeric|min:0',
            'achieved_value' => 'nullable|numeric|min:0',
            'unit' => 'required|in:' . implode(',', array_keys(Target::UNITS)),
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:' . implode(',', array_keys(Target::STATUSES)),
            'assigned_to' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'priority' => 'required|integer|min:1|max:5',
            'is_public' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_public'] = $request->has('is_public');
        $data['achieved_value'] = $data['achieved_value'] ?? 0;

        Target::create($data);

        return redirect()->route('crm.targets.index')
            ->with('success', 'Target created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $target = Target::findOrFail($id);
        return view('crm.targets.show', compact('target'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $target = Target::findOrFail($id);
        $types = Target::TYPES;
        $categories = Target::CATEGORIES;
        $statuses = Target::STATUSES;
        $priorities = Target::PRIORITIES;
        $units = Target::UNITS;
        
        return view('crm.targets.edit', compact('target', 'types', 'categories', 'statuses', 'priorities', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Target::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:' . implode(',', array_keys(Target::TYPES)),
            'category' => 'required|in:' . implode(',', array_keys(Target::CATEGORIES)),
            'target_value' => 'required|numeric|min:0',
            'achieved_value' => 'nullable|numeric|min:0',
            'unit' => 'required|in:' . implode(',', array_keys(Target::UNITS)),
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:' . implode(',', array_keys(Target::STATUSES)),
            'assigned_to' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'priority' => 'required|integer|min:1|max:5',
            'is_public' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_public'] = $request->has('is_public');
        $data['achieved_value'] = $data['achieved_value'] ?? 0;

        $target->update($data);

        return redirect()->route('crm.targets.index')
            ->with('success', 'Target updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Target::findOrFail($id);
        $target->delete();

        return redirect()->route('crm.targets.index')
            ->with('success', 'Target deleted successfully!');
    }

    /**
     * Update target progress
     */
    public function updateProgress(Request $request, string $id)
    {
        $target = Target::findOrFail($id);
        
        $request->validate([
            'achieved_value' => 'required|numeric|min:0'
        ]);

        $target->updateProgress($request->achieved_value);

        return redirect()->back()
            ->with('success', 'Target progress updated successfully!');
    }

    /**
     * Complete target
     */
    public function complete(string $id)
    {
        $target = Target::findOrFail($id);
        $target->complete();

        return redirect()->back()
            ->with('success', 'Target marked as completed!');
    }

    /**
     * Pause target
     */
    public function pause(string $id)
    {
        $target = Target::findOrFail($id);
        $target->pause();

        return redirect()->back()
            ->with('success', 'Target paused!');
    }

    /**
     * Resume target
     */
    public function resume(string $id)
    {
        $target = Target::findOrFail($id);
        $target->resume();

        return redirect()->back()
            ->with('success', 'Target resumed!');
    }

    /**
     * Cancel target
     */
    public function cancel(string $id)
    {
        $target = Target::findOrFail($id);
        $target->cancel();

        return redirect()->back()
            ->with('success', 'Target cancelled!');
    }
}
