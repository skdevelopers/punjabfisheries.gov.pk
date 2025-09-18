<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('media')
            ->latest()
            ->paginate(12);
        
        return view('cms.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_public' => 'boolean'
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_public' => $request->has('is_public'),
            'org_unit_id' => auth()->check() ? auth()->user()->org_unit_id : null
        ]);

        // Upload images using Spatie Media Library
        foreach ($request->file('images') as $image) {
            $gallery->addMediaFromRequest($image)
                ->toMediaCollection('images');
        }

        return redirect()->route('cms.gallery.index')
            ->with('success', 'Gallery created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $gallery->load('media');
        return view('cms.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $gallery->load('media');
        return view('cms.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_public' => 'boolean'
        ]);

        $gallery->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'is_public' => $request->has('is_public')
        ]);

        // Add new images if provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $gallery->addMediaFromRequest($image)
                    ->toMediaCollection('images');
            }
        }

        return redirect()->route('cms.gallery.index')
            ->with('success', 'Gallery updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete all media files
        $gallery->clearMediaCollection('images');
        
        $gallery->delete();

        return redirect()->route('cms.gallery.index')
            ->with('success', 'Gallery deleted successfully!');
    }

    /**
     * Remove a specific image from gallery
     */
    public function removeImage(Request $request, Gallery $gallery)
    {
        $request->validate([
            'media_id' => 'required|exists:media,id'
        ]);

        $media = $gallery->media()->findOrFail($request->media_id);
        $media->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Get gallery images for selection (AJAX)
     */
    public function getImages(Request $request)
    {
        $galleries = Gallery::with('media')
            ->where('is_public', true)
            ->get();

        $images = collect();
        foreach ($galleries as $gallery) {
            foreach ($gallery->media as $media) {
                $images->push([
                    'id' => $media->id,
                    'url' => $media->getUrl(),
                    'thumb' => $media->getUrl('thumb'),
                    'name' => $media->name,
                    'gallery_title' => $gallery->title,
                    'size' => $media->size,
                    'created_at' => $media->created_at
                ]);
            }
        }

        return response()->json($images);
    }

    /**
     * Toggle gallery public status
     */
    public function togglePublic(Gallery $gallery)
    {
        $gallery->update(['is_public' => !$gallery->is_public]);
        
        return response()->json([
            'success' => true,
            'is_public' => $gallery->is_public
        ]);
    }
}
