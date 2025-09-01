<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = BlogTag::withCount('posts')->ordered()->paginate(15);
        return view('cms.blog-tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.blog-tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags',
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-F]{6}$/i',
            'is_active' => 'boolean'
        ]);

        BlogTag::create($request->all());

        return redirect()->route('cms.blog-tags.index')
                        ->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogTag $blogTag)
    {
        $tag = $blogTag->load(['posts' => function($query) {
            $query->latest()->paginate(10);
        }]);
        
        return view('cms.blog-tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogTag $blogTag)
    {
        $tag = $blogTag;
        return view('cms.blog-tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogTag $blogTag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_tags,name,' . $blogTag->id,
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-F]{6}$/i',
            'is_active' => 'boolean'
        ]);

        $blogTag->update($request->all());

        return redirect()->route('cms.blog-tags.index')
                        ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogTag $blogTag)
    {
        $blogTag->delete();

        return redirect()->route('cms.blog-tags.index')
                        ->with('success', 'Tag deleted successfully.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(BlogTag $blogTag)
    {
        $blogTag->update(['is_active' => !$blogTag->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $blogTag->is_active
        ]);
    }
}
