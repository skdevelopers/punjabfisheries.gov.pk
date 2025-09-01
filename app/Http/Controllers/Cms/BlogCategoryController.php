<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::withCount('posts')->ordered()->paginate(15);
        return view('cms.blog-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories',
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-F]{6}$/i',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        BlogCategory::create($request->all());

        return redirect()->route('cms.blog-categories.index')
                        ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        $category = $blogCategory->load(['posts' => function($query) {
            $query->latest()->paginate(10);
        }]);
        
        return view('cms.blog-categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        $category = $blogCategory;
        return view('cms.blog-categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $blogCategory->id,
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7|regex:/^#[0-9A-F]{6}$/i',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        $blogCategory->update($request->all());

        return redirect()->route('cms.blog-categories.index')
                        ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        // Check if category has posts
        if ($blogCategory->posts()->count() > 0) {
            return redirect()->route('cms.blog-categories.index')
                            ->with('error', 'Cannot delete category with existing posts.');
        }

        $blogCategory->delete();

        return redirect()->route('cms.blog-categories.index')
                        ->with('success', 'Category deleted successfully.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(BlogCategory $blogCategory)
    {
        $blogCategory->update(['is_active' => !$blogCategory->is_active]);
        
        return response()->json([
            'success' => true,
            'is_active' => $blogCategory->is_active
        ]);
    }

    /**
     * Reorder categories
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:blog_categories,id',
            'categories.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->categories as $category) {
            BlogCategory::where('id', $category['id'])
                       ->update(['order' => $category['order']]);
        }

        return response()->json(['success' => true]);
    }
}
