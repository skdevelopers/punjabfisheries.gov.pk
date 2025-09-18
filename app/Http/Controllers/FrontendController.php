<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\BlogComment;
use App\Models\Tender;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage
     */
    public function index()
    {
        // Get active sliders for the homepage
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order')
                        ->get();
        
        // Get published pages for navigation
        $pages = Page::where('status', 'published')
                    ->get();

        // Get featured announcements for homepage
        $featuredAnnouncements = Announcement::active()
            ->published()
            ->notExpired()
            ->featured()
            ->orderBy('sort_order', 'asc')
            ->orderBy('published_date', 'desc')
            ->limit(6)
            ->get();

        // Get latest announcements for homepage
        $latestAnnouncements = Announcement::active()
            ->published()
            ->notExpired()
            ->orderBy('published_date', 'desc')
            ->limit(6)
            ->get();
        
        return view('frontend.index', compact('sliders', 'pages', 'featuredAnnouncements', 'latestAnnouncements'));
    }
    
    /**
     * Display a specific page
     */
    public function page($slug)
    {
        $page = Page::where('slug', $slug)
                   ->where('status', 'published')
                   ->firstOrFail();
        
        return view('frontend.page', compact('page'));
    }
    
    /**
     * Display about page
     */
    public function about()
    {
        // Get active sliders for the about page banner
        $sliders = Slider::where('is_active', true)
                        ->orderBy('order')
                        ->get();
        
        return view('frontend.about', compact('sliders'));
    }
    
    /**
     * Display services page
     */
    public function services()
    {
        return view('frontend.services');
    }
    
    /**
     * Display contact page
     */
    public function contact()
    {
        return view('frontend.contact');
    }
    
    /**
     * Display blog page
     */
    public function blog(Request $request)
    {
        $query = BlogPost::with(['category', 'author', 'tags'])->published();

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by tag
        if ($request->filled('tag')) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        $posts = $query->latest('published_at')->paginate(12);
        $categories = BlogCategory::active()->withCount('publishedPosts')->ordered()->get();
        $tags = BlogTag::active()->withCount('publishedPosts')->ordered()->get();

        return view('frontend.blogs', compact('posts', 'categories', 'tags'));
    }
    
    /**
     * Display blog details page
     */
    public function blogDetails($slug)
    {
        $post = BlogPost::with(['category', 'author', 'tags', 'comments'])
                       ->where('slug', $slug)
                       ->published()
                       ->firstOrFail();

        // Increment view count
        $post->incrementViewCount();

        // Get sidebar data
        $categories = BlogCategory::active()->withCount('publishedPosts')->ordered()->get();
        $recentPosts = BlogPost::with(['category', 'author'])
                              ->published()
                              ->where('id', '!=', $post->id)
                              ->latest('published_at')
                              ->limit(3)
                              ->get();
        
        $relatedPosts = BlogPost::with(['category', 'author'])
                               ->published()
                               ->where('id', '!=', $post->id)
                               ->where('category_id', $post->category_id)
                               ->latest('published_at')
                               ->limit(3)
                               ->get();

        return view('frontend.blog-details', compact('post', 'slug', 'categories', 'recentPosts', 'relatedPosts'));
    }
    
    /**
     * Submit a comment
     */
    public function submitComment(Request $request)
    {
        $request->validate([
            'blog_post_id' => 'required|exists:blog_posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:blog_comments,id'
        ]);

        // Check if comments are allowed for this post
        $post = BlogPost::findOrFail($request->blog_post_id);
        if (!$post->allow_comments) {
            return back()->with('error', 'Comments are not allowed for this post.');
        }

        // Create the comment
        $comment = BlogComment::create([
            'blog_post_id' => $request->blog_post_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
            'status' => 'pending', // Default status - needs approval
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return back()->with('success', 'Your comment has been submitted and is awaiting approval.');
    }
    
    /**
     * Display service details page
     */
    public function serviceDetails($slug)
    {
        return view('frontend.service-details', compact('slug'));
    }
    
    /**
     * Display tenders page
     */
    public function tenders(Request $request)
    {
        // Start with published tenders only
        $query = Tender::published();

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('tender_number', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status - if not specified, show both active and closed
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('status', 'active')->notExpired();
            } elseif ($request->status === 'closed') {
                $query->where(function($q) {
                    $q->where('status', 'closed')->orWhere('deadline', '<', now());
                });
            }
        } else {
            // If no status filter, show active tenders by default
            $query->where('status', 'active')->notExpired();
        }

        $tenders = $query->latest('published_at')->paginate(12);

        return view('frontend.tenders', compact('tenders'));
    }
    
    /**
     * Download tender PDF
     */
    public function downloadTenderPdf($id)
    {
        $tender = Tender::published()->findOrFail($id);
        
        if (!$tender->pdf_path || !Storage::disk('public')->exists($tender->pdf_path)) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
        
        // Increment view count
        $tender->incrementViewCount();
        
        return response()->download(storage_path('app/public/' . $tender->pdf_path), $tender->tender_number . '.pdf');
    }

    /**
     * Download tender PDF 2
     */
    public function downloadTenderPdf2($id)
    {
        $tender = Tender::published()->findOrFail($id);
        
        if (!$tender->pdf_path_2 || !Storage::disk('public')->exists($tender->pdf_path_2)) {
            return redirect()->back()->with('error', 'PDF file not found.');
        }
        
        // Increment view count
        $tender->incrementViewCount();
        
        return response()->download(storage_path('app/public/' . $tender->pdf_path_2), $tender->tender_number . '_2.pdf');
    }
}
