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
        return view('cms.index');
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
