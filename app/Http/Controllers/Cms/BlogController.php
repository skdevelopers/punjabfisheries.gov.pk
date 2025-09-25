<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with(['category', 'author', 'tags']);

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured);
        }

        $posts = $query->latest()->paginate(15);
        $categories = BlogCategory::active()->ordered()->get();

        return view('cms.blog.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::active()->ordered()->get();
        $tags = BlogTag::active()->ordered()->get();
        
        return view('cms.blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_featured_image' => 'nullable|string|url',
            'gallery_banner_image' => 'nullable|string|url',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id'
        ]);

        $data = $request->except(['featured_image', 'banner_image', 'gallery_featured_image', 'gallery_banner_image']);
        $data['author_id'] = Auth::id();
        $data['slug'] = Str::slug($request->title);

        // Set published_at if status is published and no date provided
        if ($request->status === 'published' && !$request->published_at) {
            $data['published_at'] = now();
        }
        
        // If published_at is in the future, set it to now for immediate publishing
        if ($request->status === 'published' && $request->published_at && Carbon::parse($request->published_at)->isFuture()) {
            $data['published_at'] = now();
        }

        $post = BlogPost::create($data);

        // Handle featured image upload (file upload)
        if ($request->hasFile('featured_image')) {
            $post->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }
        // Handle featured image from gallery
        elseif ($request->filled('gallery_featured_image')) {
            $this->addMediaFromUrl($post, $request->gallery_featured_image, 'featured_image');
        }

        // Handle banner image upload (file upload)
        if ($request->hasFile('banner_image')) {
            $post->addMediaFromRequest('banner_image')
                ->toMediaCollection('banner_image');
        }
        // Handle banner image from gallery
        elseif ($request->filled('gallery_banner_image')) {
            $this->addMediaFromUrl($post, $request->gallery_banner_image, 'banner_image');
        }

        // Attach tags
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('cms.blog.index')
                        ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blog)
    {
        $post = $blog->load(['category', 'author', 'tags', 'comments']);
        return view('cms.blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blog)
    {
        $categories = BlogCategory::active()->ordered()->get();
        $tags = BlogTag::active()->ordered()->get();
        $post = $blog->load('tags');
        
        return view('cms.blog.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_featured_image' => 'nullable|string|url',
            'gallery_banner_image' => 'nullable|string|url',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'allow_comments' => 'boolean',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id'
        ]);

        $data = $request->except(['featured_image', 'banner_image', 'gallery_featured_image', 'gallery_banner_image']);
        $data['slug'] = Str::slug($request->title);

        // Handle featured image upload (file upload)
        if ($request->hasFile('featured_image')) {
            // Clear existing featured_image
            $blog->clearMediaCollection('featured_image');
            $blog->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }
        // Handle featured image from gallery
        elseif ($request->filled('gallery_featured_image')) {
            $blog->clearMediaCollection('featured_image');
            $this->addMediaFromUrl($blog, $request->gallery_featured_image, 'featured_image');
        }

        // Handle banner image upload (file upload)
        if ($request->hasFile('banner_image')) {
            // Clear existing banner_image
            $blog->clearMediaCollection('banner_image');
            $blog->addMediaFromRequest('banner_image')
                ->toMediaCollection('banner_image');
        }
        // Handle banner image from gallery
        elseif ($request->filled('gallery_banner_image')) {
            $blog->clearMediaCollection('banner_image');
            $this->addMediaFromUrl($blog, $request->gallery_banner_image, 'banner_image');
        }

        // Set published_at if status is published and no date provided
        if ($request->status === 'published' && !$request->published_at && !$blog->published_at) {
            $data['published_at'] = now();
        }
        
        // If published_at is in the future, set it to now for immediate publishing
        if ($request->status === 'published' && $request->published_at && Carbon::parse($request->published_at)->isFuture()) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        // Sync tags
        $blog->tags()->sync($request->tags ?? []);

        return redirect()->route('cms.blog.index')
                        ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blog)
    {
        // Delete images
        if ($blog->featured_image) {
            Storage::delete($blog->featured_image);
        }
        if ($blog->banner_image) {
            Storage::delete($blog->banner_image);
        }

        $blog->delete();

        return redirect()->route('cms.blog.index')
                        ->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(BlogPost $blog)
    {
        $blog->update(['is_featured' => !$blog->is_featured]);
        
        return response()->json([
            'success' => true,
            'is_featured' => $blog->is_featured
        ]);
    }

    /**
     * Publish/Unpublish post
     */
    public function togglePublish(BlogPost $blog)
    {
        if ($blog->status === 'published') {
            $blog->unpublish();
            $message = 'Post unpublished successfully.';
        } else {
            $blog->publish();
            $message = 'Post published successfully.';
        }

        return response()->json([
            'success' => true,
            'status' => $blog->status,
            'message' => $message
        ]);
    }

    /**
     * Upload image helper method
     */
    private function uploadImage($file, $path)
    {
        $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($path, $filename, 'public');
        return $filePath;
    }

    /**
     * Add media from URL to blog post
     */
    private function addMediaFromUrl($post, $url, $collection)
    {
        try {
            $post->addMediaFromUrl($url)
                ->toMediaCollection($collection);
        } catch (\Exception $e) {
            // Log error but don't break the flow
            Log::error('Failed to add media from URL: ' . $e->getMessage(), [
                'url' => $url,
                'collection' => $collection,
                'post_id' => $post->id
            ]);
        }
    }

    /**
     * Preview blog post
     */
    public function preview()
    {
        return view('cms.blog.preview');
    }
}
