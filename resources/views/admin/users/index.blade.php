<x-app-layout title="User Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">User Management</h2>
                        <p class="text-slate-500 dark:text-navy-200">Manage system users, roles, and permissions</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.roles.index') }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Manage Roles
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add New User
                        </a>
                    </div>
                </div>
                
                <!-- Search Bar -->
                <div class="px-4 sm:px-5 pb-4">
                    <div class="flex items-center space-x-3">
                        <div class="relative flex-1 max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchInput"
                                   value="{{ request('search') }}"
                                   placeholder="Search by name, email, or staff ID..." 
                                   class="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 dark:placeholder-navy-300">
                        </div>
                        <button type="button" id="searchBtn" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search
                        </button>
                        <button type="button" id="clearBtn" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" style="display: none;">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </button>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    @if(session('success'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-success/10 px-4 py-3 text-success dark:bg-success/15 dark:text-success-light">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-error/10 px-4 py-3 text-error dark:bg-error/15 dark:text-error-light">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div id="searchMessage" class="mx-4 sm:mx-5 mb-4 rounded-lg bg-info/10 px-4 py-3 text-info dark:bg-info/15 dark:text-info-light" style="display: none;">
                        <div class="flex items-center">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span id="searchText"></span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table id="usersTable" class="w-full border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 dark:border-navy-500">
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Name</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Staff ID</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Designation</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Roles</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Office</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-navy-800 divide-y divide-slate-200 dark:divide-navy-500">
                                @forelse($users as $user)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-navy-700 transition-colors">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div class="avatar h-10 w-10">
                                                    <div class="is-initial rounded-full bg-info text-sm font-medium text-white">
                                                        {{ substr($user->name, 0, 2) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-slate-900 dark:text-navy-100">{{ $user->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-900 dark:text-navy-100">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-600 dark:text-navy-200">{{ $user->staff_id ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-600 dark:text-navy-200">{{ $user->designation ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex flex-wrap gap-1 max-w-xs">
                                                @forelse($user->roles as $role)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-info/10 text-info dark:bg-info/15 dark:text-info-light">
                                                        {{ $role->name }}
                                                    </span>
                                                @empty
                                                    <span class="text-xs text-slate-500 dark:text-navy-300">No roles</span>
                                                @endforelse
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-600 dark:text-navy-200">{{ $user->office_name ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('admin.users.show', $user) }}" class="text-info hover:text-info-focus transition-colors" title="View">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.users.edit', $user) }}" class="text-warning hover:text-warning-focus transition-colors" title="Edit">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-error hover:text-error-focus transition-colors" title="Delete">
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
                                        <td colspan="7" class="px-4 py-8 text-center text-slate-500 dark:text-navy-300">
                                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                            <p class="mt-2">No users found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div id="paginationContainer" class="mt-6">
                        @if($users->hasPages())
                            {{ $users->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const clearBtn = document.getElementById('clearBtn');
    const searchMessage = document.getElementById('searchMessage');
    const searchText = document.getElementById('searchText');
    const usersTable = document.getElementById('usersTable');
    const paginationContainer = document.getElementById('paginationContainer');
    
    // Show clear button if there's initial search
    if (searchInput.value.trim()) {
        clearBtn.style.display = 'inline-flex';
    }
    
    // Search function
    function performSearch() {
        const searchTerm = searchInput.value.trim();
        
        if (!searchTerm) {
            clearSearch();
            return;
        }
        
        // Show loading state
        searchBtn.innerHTML = '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Searching...';
        searchBtn.disabled = true;
        
        // Make AJAX request
        axios.get('{{ route("admin.users.index") }}', {
            params: { search: searchTerm }
        })
        .then(function(response) {
            // Update table content
            const parser = new DOMParser();
            const doc = parser.parseFromString(response.data, 'text/html');
            const newTable = doc.getElementById('usersTable');
            const newPagination = doc.getElementById('paginationContainer');
            
            if (newTable) {
                usersTable.innerHTML = newTable.innerHTML;
            }
            
            if (newPagination) {
                paginationContainer.innerHTML = newPagination.innerHTML;
            }
            
            // Show search message
            searchMessage.style.display = 'block';
            searchText.innerHTML = `Search results for: <strong>"${searchTerm}"</strong>`;
            
            // Show clear button
            clearBtn.style.display = 'inline-flex';
            
            // Update URL without page refresh
            const url = new URL(window.location);
            url.searchParams.set('search', searchTerm);
            window.history.pushState({}, '', url);
        })
        .catch(function(error) {
            console.error('Search error:', error);
            alert('Search failed. Please try again.');
        })
        .finally(function() {
            // Reset button state
            searchBtn.innerHTML = '<svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search';
            searchBtn.disabled = false;
        });
    }
    
    // Clear search function
    function clearSearch() {
        searchInput.value = '';
        searchMessage.style.display = 'none';
        clearBtn.style.display = 'none';
        
        // Reset to original page
        axios.get('{{ route("admin.users.index") }}')
        .then(function(response) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(response.data, 'text/html');
            const newTable = doc.getElementById('usersTable');
            const newPagination = doc.getElementById('paginationContainer');
            
            if (newTable) {
                usersTable.innerHTML = newTable.innerHTML;
            }
            
            if (newPagination) {
                paginationContainer.innerHTML = newPagination.innerHTML;
            }
            
            // Update URL
            const url = new URL(window.location);
            url.searchParams.delete('search');
            window.history.pushState({}, '', url);
        })
        .catch(function(error) {
            console.error('Clear error:', error);
            // Fallback to page reload
            window.location.href = '{{ route("admin.users.index") }}';
        });
    }
    
    // Event listeners
    searchBtn.addEventListener('click', performSearch);
    clearBtn.addEventListener('click', clearSearch);
    
    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });
    
    // Show/hide clear button based on input
    searchInput.addEventListener('input', function() {
        if (this.value.trim()) {
            clearBtn.style.display = 'inline-flex';
        } else {
            clearBtn.style.display = 'none';
            searchMessage.style.display = 'none';
        }
    });
});
</script>