<x-app-layout title="Blog Comments Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Blog Comments Management</h1>
        <div class="flex space-x-2">
            <a href="{{ route('cms.blog-comments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Comment
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('cms.blog-comments.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="spam" {{ request('status') == 'spam' ? 'selected' : '' }}>Spam</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Post</label>
                <select name="post" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    <option value="">All Posts</option>
                    @foreach(\App\Models\BlogPost::published()->get() as $post)
                        <option value="{{ $post->id }}" {{ request('post') == $post->id ? 'selected' : '' }}>
                            {{ Str::limit($post->title, 50) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Bulk Actions -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <select id="bulk-action" class="border border-gray-300 rounded-md px-3 py-2">
                    <option value="">Bulk Actions</option>
                    <option value="approve">Approve</option>
                    <option value="spam">Mark as Spam</option>
                    <option value="delete">Delete</option>
                </select>
                <button type="button" onclick="applyBulkAction()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Apply
                </button>
            </div>
            <div class="text-sm text-gray-600">
                {{ $comments->total() }} comments found
            </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <input type="checkbox" id="select-all" class="rounded border-gray-300" onchange="toggleAllComments(this)">
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Comment
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Post
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                <tr>
                    <td class="whitespace-nowrap">
                        <input type="checkbox" name="comments[]" value="{{ $comment->id }}" class="comment-checkbox form-checkbox">
                    </td>
                    <td class="whitespace-nowrap">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-navy-600 flex items-center justify-center">
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">{{ substr($comment->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">{{ $comment->name }}</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">{{ $comment->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="text-sm text-slate-800 dark:text-navy-50 max-w-xs truncate">
                            {{ Str::limit($comment->comment, 100) }}
                        </div>
                        @if($comment->parent)
                            <div class="text-xs text-slate-500 dark:text-navy-200 mt-1">
                                Reply to: {{ Str::limit($comment->parent->name, 30) }}
                            </div>
                        @endif
                    </td>
                    <td class="whitespace-nowrap">
                        <div class="text-sm text-slate-800 dark:text-navy-50">
                            <a href="{{ route('frontend.blog.details', $comment->post->slug) }}" target="_blank" class="text-primary hover:text-primary-focus">
                                {{ Str::limit($comment->post->title, 40) }}
                            </a>
                        </div>
                    </td>
                    <td class="whitespace-nowrap">
                        @if($comment->status === 'approved')
                            <span class="badge bg-success/10 text-success border-success/20">Approved</span>
                        @elseif($comment->status === 'pending')
                            <span class="badge bg-warning/10 text-warning border-warning/20">Pending</span>
                        @else
                            <span class="badge bg-error/10 text-error border-error/20">Spam</span>
                        @endif
                    </td>
                    <td class="whitespace-nowrap">
                        <span class="text-sm text-slate-500 dark:text-navy-200">{{ $comment->created_at->format('M d, Y') }}</span>
                    </td>
                    <td class="whitespace-nowrap">
                        <div class="flex items-center space-x-2">
                            @if($comment->status === 'pending')
                                <button onclick="approveComment({{ $comment->id }})" class="btn size-8 p-0 text-success hover:text-success-focus">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                            @endif
                            @if($comment->status !== 'spam')
                                <button onclick="markAsSpam({{ $comment->id }})" class="btn size-8 p-0 text-warning hover:text-warning-focus">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                </button>
                            @endif
                            <a href="{{ route('cms.blog-comments.edit', $comment) }}" class="btn size-8 p-0 text-slate-500 hover:text-slate-700 dark:text-navy-300 dark:hover:text-navy-100">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('cms.blog-comments.destroy', $comment) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn size-8 p-0 text-error hover:text-error-focus">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-8">
                        <div class="text-slate-500 dark:text-navy-200">
                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-navy-50">No comments</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-navy-200">Get started by creating a new comment.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $comments->appends(request()->query())->links() }}
    </div>
</div>

<script>
// Select all functionality
document.getElementById('select-all').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.comment-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Approve comment
function approveComment(commentId) {
    if (confirm('Are you sure you want to approve this comment?')) {
        fetch(`/cms/blog-comments/${commentId}/approve`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
}

// Mark as spam
function markAsSpam(commentId) {
    if (confirm('Are you sure you want to mark this comment as spam?')) {
        fetch(`/cms/blog-comments/${commentId}/spam`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        });
    }
    }
</script>
        </main>
    </x-app-layout>
