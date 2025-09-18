<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::orderBy('sort_order', 'asc')
            ->orderBy('published_date', 'desc')
            ->paginate(20);

        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'type' => 'required|in:general,tender,notice,corrigendum',
            'status' => 'required|in:active,inactive,draft',
            'priority' => 'required|in:high,normal,low',
            'published_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:published_date',
            'external_url' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Remove spaces and special characters from filename
            $originalName = $file->getClientOriginalName();
            $cleanName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName);
            $fileName = time() . '_' . $cleanName;
            $filePath = $file->storeAs('announcements', $fileName, 'public');
            $data['file_path'] = $filePath;
            $data['file_name'] = $originalName; // Keep original name for display
        }

        $data['is_featured'] = $request->has('is_featured');

        Announcement::create($data);

        return redirect()->route('cms.announcements.index')
            ->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'type' => 'required|in:general,tender,notice,corrigendum',
            'status' => 'required|in:active,inactive,draft',
            'priority' => 'required|in:high,normal,low',
            'published_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:published_date',
            'external_url' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'is_featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file
            if ($announcement->file_path) {
                Storage::disk('public')->delete($announcement->file_path);
            }
            
            $file = $request->file('file');
            // Remove spaces and special characters from filename
            $originalName = $file->getClientOriginalName();
            $cleanName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $originalName);
            $fileName = time() . '_' . $cleanName;
            $filePath = $file->storeAs('announcements', $fileName, 'public');
            $data['file_path'] = $filePath;
            $data['file_name'] = $originalName; // Keep original name for display
        }

        $data['is_featured'] = $request->has('is_featured');

        $announcement->update($data);

        return redirect()->route('cms.announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        // Delete file if exists
        if ($announcement->file_path) {
            Storage::disk('public')->delete($announcement->file_path);
        }

        $announcement->delete();

        return redirect()->route('cms.announcements.index')
            ->with('success', 'Announcement deleted successfully.');
    }

    /**
     * Toggle announcement status.
     */
    public function toggleStatus(Announcement $announcement)
    {
        $announcement->update([
            'status' => $announcement->status === 'active' ? 'inactive' : 'active'
        ]);

        return response()->json([
            'success' => true,
            'status' => $announcement->status,
            'message' => 'Announcement status updated successfully.'
        ]);
    }

    /**
     * Toggle announcement featured status.
     */
    public function toggleFeatured(Announcement $announcement)
    {
        $announcement->update([
            'is_featured' => !$announcement->is_featured
        ]);

        return response()->json([
            'success' => true,
            'is_featured' => $announcement->is_featured,
            'message' => 'Announcement featured status updated successfully.'
        ]);
    }

    /**
     * Reorder announcements.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'announcements' => 'required|array',
            'announcements.*.id' => 'required|exists:announcements,id',
            'announcements.*.sort_order' => 'required|integer|min:0',
        ]);

        foreach ($request->announcements as $announcement) {
            Announcement::where('id', $announcement['id'])
                ->update(['sort_order' => $announcement['sort_order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Announcements reordered successfully.'
        ]);
    }
}
