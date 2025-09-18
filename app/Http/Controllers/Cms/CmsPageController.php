<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CmsPageController extends Controller
{
    public function index()
    {
        // Get real CMS analytics data
        $blogPosts = \App\Models\BlogPost::count();
        $publishedPosts = \App\Models\BlogPost::where('status', 'published')->count();
        $draftPosts = \App\Models\BlogPost::where('status', 'draft')->count();
        $totalViews = \App\Models\BlogPost::sum('view_count');
        $avgViews = $blogPosts > 0 ? round($totalViews / $blogPosts, 0) : 0;
        
        $totalComments = \App\Models\BlogComment::count();
        $pendingComments = \App\Models\BlogComment::where('status', 'pending')->count();
        $approvedComments = \App\Models\BlogComment::where('status', 'approved')->count();
        
        $totalPages = \App\Models\Page::count();
        $publishedPages = \App\Models\Page::where('status', 'published')->count();
        
        $totalTenders = \App\Models\Tender::count();
        $activeTenders = \App\Models\Tender::where('status', 'active')->where('is_published', true)->count();
        $expiredTenders = \App\Models\Tender::where('deadline', '<', now())->count();
        
        $totalAnnouncements = \App\Models\Announcement::count();
        $activeAnnouncements = \App\Models\Announcement::active()->count();
        
        $totalSliders = \App\Models\Slider::count();
        $activeSliders = \App\Models\Slider::where('is_active', true)->count();
        
        // Get recent blog posts for analytics
        $recentPosts = \App\Models\BlogPost::with(['category', 'author'])
            ->latest()
            ->limit(10)
            ->get();
            
        // Get top performing posts
        $topPosts = \App\Models\BlogPost::with(['category', 'author'])
            ->orderBy('view_count', 'desc')
            ->limit(8)
            ->get();
            
        // Get monthly blog post data for chart (PostgreSQL compatible)
        $monthlyData = \App\Models\BlogPost::selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');
            
        // Get monthly view data for chart (PostgreSQL compatible)
        $monthlyViews = \App\Models\BlogPost::selectRaw('EXTRACT(MONTH FROM created_at) as month, SUM(view_count) as views')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');
            
        // Calculate monthly increase
        $currentMonth = now()->month;
        $lastMonth = $currentMonth - 1;
        $currentMonthViews = $monthlyViews->get($currentMonth)->views ?? 0;
        $lastMonthViews = $monthlyViews->get($lastMonth)->views ?? 0;
        $monthlyIncrease = $lastMonthViews > 0 ? round((($currentMonthViews - $lastMonthViews) / $lastMonthViews) * 100, 1) : 0;
        
        // Get recent activities
        $recentActivities = collect();
        
        // Add recent blog posts
        foreach(\App\Models\BlogPost::latest()->limit(3)->get() as $post) {
            $recentActivities->push([
                'type' => 'blog',
                'title' => $post->title,
                'action' => $post->status == 'published' ? 'Blog post published' : 'Blog post created',
                'time' => $post->created_at,
                'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
                'color' => 'purple-500'
            ]);
        }
        
        // Add recent tenders
        foreach(\App\Models\Tender::latest()->limit(2)->get() as $tender) {
            $recentActivities->push([
                'type' => 'tender',
                'title' => $tender->title,
                'action' => $tender->is_published ? 'Tender published' : 'Tender created',
                'time' => $tender->created_at,
                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                'color' => 'blue-500'
            ]);
        }
        
        // Add recent announcements
        foreach(\App\Models\Announcement::latest()->limit(2)->get() as $announcement) {
            $recentActivities->push([
                'type' => 'announcement',
                'title' => $announcement->title,
                'action' => 'Announcement created',
                'time' => $announcement->created_at,
                'icon' => 'M15 17h5l-5 5v-5zM4 19h6v-6H4v6zM4 5h6V1H4v4zM15 3h5l-5-5v5z',
                'color' => 'red-500'
            ]);
        }
        
        // Sort by creation time and take latest 5
        $recentActivities = $recentActivities->sortByDesc('time')->take(5);
        
        return view('cms.dashboard', compact(
            'blogPosts', 'publishedPosts', 'draftPosts', 'totalViews', 'avgViews',
            'totalComments', 'pendingComments', 'approvedComments',
            'totalPages', 'publishedPages',
            'totalTenders', 'activeTenders', 'expiredTenders',
            'totalAnnouncements', 'activeAnnouncements',
            'totalSliders', 'activeSliders',
            'recentPosts', 'topPosts', 'monthlyData', 'monthlyViews',
            'monthlyIncrease', 'recentActivities'
        ));
    }

    public function pages()
    {
        $pages = Page::latest()->paginate(10);
        return view('cms.pages.index', compact('pages'));
    }

    public function createPage()
    {
        return view('cms.pages.create');
    }

    public function storePage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->only(['title', 'slug', 'content', 'meta_description', 'status']);
        
        $page = Page::create($data);
        
        // Handle featured_image upload
        if ($request->hasFile('featured_image')) {
            $page->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }
        
        // Handle banner upload
        if ($request->hasFile('banner')) {
            $page->addMediaFromRequest('banner')
                ->toMediaCollection('banner');
        }

        return redirect()->route('cms.pages')->with('success', 'Page created successfully!');
    }

    public function editPage($id)
    {
        $page = Page::findOrFail($id);
        return view('cms.pages.edit', compact('page'));
    }

    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $id,
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $page = Page::findOrFail($id);
        $data = $request->only(['title', 'slug', 'content', 'meta_description', 'status']);
        
        // Handle featured_image upload
        if ($request->hasFile('featured_image')) {
            // Clear existing featured_image
            $page->clearMediaCollection('featured_image');
            $page->addMediaFromRequest('featured_image')
                ->toMediaCollection('featured_image');
        }
        
        // Handle banner upload
        if ($request->hasFile('banner')) {
            // Clear existing banner
            $page->clearMediaCollection('banner');
            $page->addMediaFromRequest('banner')
                ->toMediaCollection('banner');
        }

        $page->update($data);
        return redirect()->route('cms.pages')->with('success', 'Page updated successfully!');
    }

    public function deletePage($id)
    {
        $page = Page::findOrFail($id);
        
        // Clear all media collections (this will also delete the files)
        $page->clearMediaCollection('featured_image');
        $page->clearMediaCollection('banner');
        
        $page->delete();
        return redirect()->route('cms.pages')->with('success', 'Page deleted successfully!');
    }

    public function media(Request $request)
    {
        try {
            Log::info('Media method called', ['request' => $request->all()]);
            
            $query = \App\Models\Gallery::withoutGlobalScope('org_scope')->with('media');

            // Filter by collection type
            if ($request->filled('type')) {
                $query->whereHas('media', function ($q) use ($request) {
                    $q->where('collection_name', $request->type);
                });
            }

            // Search functionality
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhereHas('media', function ($mediaQuery) use ($search) {
                          $mediaQuery->where('name', 'like', "%{$search}%")
                                    ->orWhere('file_name', 'like', "%{$search}%");
                      });
                });
            }

            // Filter by date range
            if ($request->filled('date_from')) {
                $query->whereDate('created_at', '>=', $request->date_from);
            }
            if ($request->filled('date_to')) {
                $query->whereDate('created_at', '<=', $request->date_to);
            }

            $galleries = $query->orderBy('created_at', 'desc')->paginate(20);
            Log::info('Galleries found', ['count' => $galleries->count()]);

            // Get all galleries for dropdown (without pagination) - bypass org scope
            $allGalleries = \App\Models\Gallery::withoutGlobalScope('org_scope')->orderBy('title', 'asc')->get();
            Log::info('All galleries found', ['count' => $allGalleries->count()]);
            
            // Get all media items for stats
            $allMedia = \Spatie\MediaLibrary\MediaCollections\Models\Media::where('model_type', \App\Models\Gallery::class)->get();
            Log::info('All media found', ['count' => $allMedia->count()]);
            
            $stats = [
                'total_media' => $allMedia->count(),
                'total_size' => $allMedia->sum('size'),
                'images' => $allMedia->where('collection_name', 'images')->count(),
                'documents' => $allMedia->where('collection_name', 'documents')->count(),
                'videos' => $allMedia->where('collection_name', 'videos')->count(),
                'audio' => $allMedia->where('collection_name', 'audio')->count(),
            ];
            
            Log::info('Stats calculated', $stats);
            
            return view('cms.media.index', compact('galleries', 'allGalleries', 'stats'));
        } catch (\Exception $e) {
            Log::error('Error in media method', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    public function uploadMedia(Request $request)
    {
        try {
            Log::info('Upload request received', [
                'has_files' => $request->hasFile('files'),
                'files_count' => $request->hasFile('files') ? count($request->file('files')) : 0,
                'all_input' => $request->all(),
                'method' => $request->method(),
                'content_type' => $request->header('Content-Type')
            ]);

            // Check if files are present - handle both 'files' and 'files[]' formats
            $filesKey = $request->hasFile('files') ? 'files' : 'files[]';
            if (!$request->hasFile($filesKey)) {
                Log::error('No files found in request');
                return response()->json(['error' => 'No files found'], 400);
            }

            $request->validate([
                $filesKey => 'required|array|min:1',
                $filesKey . '.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
                'gallery_id' => 'required|exists:galleries,id',
                'collection_name' => 'required|in:images,documents,videos,audio'
            ]);

            // Test database connection first
            try {
                DB::connection()->getPdo();
                Log::info('Database connection successful');
            } catch (\Exception $e) {
                Log::error('Database connection failed: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Database connection failed: ' . $e->getMessage()
                ], 500);
            }

            // Check if media table exists
            try {
                DB::table('media')->count();
                Log::info('Media table exists');
            } catch (\Exception $e) {
                Log::error('Media table does not exist: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Media table not found. Please run migrations: ' . $e->getMessage()
                ], 500);
            }

            // Get the selected gallery - bypass org scope
            $gallery = \App\Models\Gallery::withoutGlobalScope('org_scope')->findOrFail($request->gallery_id);
            $collectionName = $request->collection_name;
            
            Log::info('Using gallery with ID: ' . $gallery->id . ' and collection: ' . $collectionName);

            $uploadedImages = [];
            foreach ($request->file($filesKey) as $file) {
                Log::info('Processing file', [
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType()
                ]);

                try {
                    $media = $gallery->addMedia($file)
                        ->toMediaCollection($collectionName);
                    
                    $uploadedImages[] = [
                        'id' => $media->id,
                        'url' => $media->getUrl(),
                        'thumb' => $media->getUrl('thumb'),
                        'name' => $media->name,
                        'gallery_title' => $gallery->title,
                        'size' => $media->size,
                        'created_at' => $media->created_at
                    ];
                    
                    Log::info('File uploaded successfully', ['media_id' => $media->id]);
                } catch (\Exception $e) {
                    Log::error('Failed to upload file: ' . $e->getMessage());
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload file: ' . $e->getMessage()
                    ], 500);
                }
            }
            
            Log::info('Upload successful', ['uploaded_count' => count($uploadedImages)]);
            
            return response()->json([
                'success' => true,
                'images' => $uploadedImages
            ]);
        } catch (\Exception $e) {
            Log::error('Upload error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getImages(Request $request)
    {
        $galleries = \App\Models\Gallery::with('media')
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

    public function deleteImage(Request $request)
    {
        $request->validate([
            'image_id' => 'required|exists:media,id'
        ]);

        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($request->image_id);
        $media->delete();

        return response()->json(['success' => true]);
    }

    // New Media Library Methods
    public function showMedia(\Spatie\MediaLibrary\MediaCollections\Models\Media $media)
    {
        $media->load('model');
        
        return response()->json([
            'success' => true,
            'media' => [
                'id' => $media->id,
                'name' => $media->name,
                'file_name' => $media->file_name,
                'mime_type' => $media->mime_type,
                'size' => $media->size,
                'formatted_size' => $this->formatBytes($media->size),
                'url' => $media->getUrl(),
                'thumb_url' => $media->getUrl('thumb'),
                'alt_text' => $media->getCustomProperty('alt_text', ''),
                'width' => $media->getCustomProperty('width'),
                'height' => $media->getCustomProperty('height'),
                'collection_name' => $media->collection_name,
                'created_at' => $media->created_at->format('M d, Y H:i'),
                'updated_at' => $media->updated_at->format('M d, Y H:i'),
                'gallery' => $media->model ? [
                    'id' => $media->model->id,
                    'title' => $media->model->title,
                ] : null,
            ]
        ]);
    }

    public function updateMedia(Request $request, \Spatie\MediaLibrary\MediaCollections\Models\Media $media)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $media->update([
                'name' => $request->name,
                'alt_text' => $request->alt_text,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Media updated successfully',
                'media' => [
                    'id' => $media->id,
                    'name' => $media->name,
                    'alt_text' => $media->alt_text,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyMedia(\Spatie\MediaLibrary\MediaCollections\Models\Media $media)
    {
        try {
            $media->delete();

            return response()->json([
                'success' => true,
                'message' => 'Media deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Delete failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function bulkDeleteMedia(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'media_ids' => 'required|array',
            'media_ids.*' => 'exists:media,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $deletedCount = \Spatie\MediaLibrary\MediaCollections\Models\Media::whereIn('id', $request->media_ids)->delete();

            return response()->json([
                'success' => true,
                'message' => "{$deletedCount} media files deleted successfully"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Bulk delete failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function createGallery(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'is_public' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $gallery = \App\Models\Gallery::create([
                'title' => $request->title,
                'slug' => \Illuminate\Support\Str::slug($request->title),
                'description' => $request->description,
                'is_public' => $request->boolean('is_public', true),
                'org_unit_id' => auth()->user()?->org_unit_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Gallery created successfully',
                'gallery' => [
                    'id' => $gallery->id,
                    'title' => $gallery->title,
                    'slug' => $gallery->slug,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery creation failed: ' . $e->getMessage()
            ], 500);
        }
    }

    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
