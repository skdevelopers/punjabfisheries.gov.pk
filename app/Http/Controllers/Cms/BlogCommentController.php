<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogComment::with(['post', 'parent']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by post
        if ($request->filled('post')) {
            $query->where('blog_post_id', $request->post);
        }

        $comments = $query->latest()->paginate(20);
        
        return view('cms.blog-comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.blog-comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_post_id' => 'required|exists:blog_posts,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:blog_comments,id',
            'status' => 'required|in:pending,approved,spam'
        ]);

        $data = $request->all();
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        BlogComment::create($data);

        return redirect()->route('cms.blog-comments.index')
                        ->with('success', 'Comment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogComment $blogComment)
    {
        $blogComment->load(['post', 'parent', 'replies']);
        return view('cms.blog-comments.show', compact('blogComment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogComment $blogComment)
    {
        return view('cms.blog-comments.edit', compact('blogComment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:2000',
            'status' => 'required|in:pending,approved,spam'
        ]);

        $blogComment->update($request->all());

        return redirect()->route('cms.blog-comments.index')
                        ->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogComment $blogComment)
    {
        $blogComment->delete();

        return redirect()->route('cms.blog-comments.index')
                        ->with('success', 'Comment deleted successfully.');
    }

    /**
     * Approve comment
     */
    public function approve(BlogComment $blogComment)
    {
        $blogComment->approve();

        return response()->json([
            'success' => true,
            'message' => 'Comment approved successfully.'
        ]);
    }

    /**
     * Mark comment as spam
     */
    public function markAsSpam(BlogComment $blogComment)
    {
        $blogComment->markAsSpam();

        return response()->json([
            'success' => true,
            'message' => 'Comment marked as spam.'
        ]);
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:approve,spam,delete',
            'comments' => 'required|array',
            'comments.*' => 'exists:blog_comments,id'
        ]);

        $comments = BlogComment::whereIn('id', $request->comments);

        switch ($request->action) {
            case 'approve':
                $comments->update(['status' => 'approved']);
                $message = 'Comments approved successfully.';
                break;
            case 'spam':
                $comments->update(['status' => 'spam']);
                $message = 'Comments marked as spam.';
                break;
            case 'delete':
                $comments->delete();
                $message = 'Comments deleted successfully.';
                break;
        }

        return redirect()->route('cms.blog-comments.index')
                        ->with('success', $message);
    }
}
