<x-app-layout title="Announcements Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Announcements Management</h2>
                        <p class="text-slate-500 dark:text-navy-200">Create and manage announcements and notices</p>
                    </div>
                    <a href="{{ route('cms.announcements.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Announcement
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-success/10 px-4 py-3 text-success dark:bg-success/15 dark:text-success-light">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-200 dark:border-navy-500">
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Title</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Type</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Priority</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Status</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Featured</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Published Date</th>
                                    <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-navy-500">
                                @forelse($announcements as $announcement)
                                <tr class="hover:bg-slate-50 dark:hover:bg-navy-600 transition-colors">
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 mr-3">
                                                @if($announcement->priority === 'high')
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">High</span>
                                                @elseif($announcement->priority === 'normal')
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Normal</span>
                                                @else
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Low</span>
                                                @endif
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <h6 class="text-sm font-medium text-slate-900 dark:text-navy-50 truncate">{{ Str::limit($announcement->title, 50) }}</h6>
                                                <p class="text-xs text-slate-500 dark:text-navy-300 truncate">{{ Str::limit($announcement->description, 60) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->type === 'tender' ? 'bg-yellow-100 text-yellow-800' : ($announcement->type === 'notice' ? 'bg-blue-100 text-blue-800' : ($announcement->type === 'corrigendum' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) }}">
                                            {{ ucfirst($announcement->type) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->priority === 'high' ? 'bg-red-100 text-red-800' : ($announcement->priority === 'normal' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                            {{ ucfirst($announcement->priority) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <label class="flex items-center">
                                            <input class="form-checkbox toggle-status text-primary" type="checkbox" 
                                                   data-id="{{ $announcement->id }}" 
                                                   {{ $announcement->status === 'active' ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">
                                                {{ ucfirst($announcement->status) }}
                                            </span>
                                        </label>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <label class="flex items-center">
                                            <input class="form-checkbox toggle-featured text-primary" type="checkbox" 
                                                   data-id="{{ $announcement->id }}" 
                                                   {{ $announcement->is_featured ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">
                                                {{ $announcement->is_featured ? 'Yes' : 'No' }}
                                            </span>
                                        </label>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-navy-300">
                                        {{ $announcement->published_date->format('M d, Y') }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('cms.announcements.show', $announcement) }}" 
                                               class="text-info hover:text-info-focus" title="View">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('cms.announcements.edit', $announcement) }}" 
                                               class="text-primary hover:text-primary-focus" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('cms.announcements.destroy', $announcement) }}" 
                                                  method="POST" class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this announcement?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-error hover:text-error-focus" title="Delete">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center">
                                        <div class="text-slate-500 dark:text-navy-300">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 009.586 13H7"></path>
                                            </svg>
                                            <p class="text-lg font-medium">No announcements found</p>
                                            <p class="text-sm">Get started by creating your first announcement.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($announcements->hasPages())
                    <div class="flex justify-center mt-6">
                        {{ $announcements->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle status
    document.querySelectorAll('.toggle-status').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const announcementId = this.dataset.id;
            const status = this.checked ? 'active' : 'inactive';
            
            fetch(`/cms/announcements/${announcementId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the label
                    const label = this.nextElementSibling;
                    label.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                } else {
                    // Revert the checkbox
                    this.checked = !this.checked;
                    alert('Failed to update status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !this.checked;
                alert('An error occurred while updating status');
            });
        });
    });

    // Toggle featured
    document.querySelectorAll('.toggle-featured').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const announcementId = this.dataset.id;
            const isFeatured = this.checked;
            
            fetch(`/cms/announcements/${announcementId}/toggle-featured`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ is_featured: isFeatured })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the label
                    const label = this.nextElementSibling;
                    label.textContent = data.is_featured ? 'Yes' : 'No';
                } else {
                    // Revert the checkbox
                    this.checked = !this.checked;
                    alert('Failed to update featured status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !this.checked;
                alert('An error occurred while updating featured status');
            });
        });
    });
});
</script>
            </div>
        </div>
    </main>
</x-app-layout>
