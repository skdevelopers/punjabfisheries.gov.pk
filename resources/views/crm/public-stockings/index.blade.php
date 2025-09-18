<x-app-layout title="Public Stocking" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12">
                <div class="card" x-data="publicStockingIndex()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Public Stocking</h1>
                                <p class="text-slate-500 dark:text-navy-200 text-sm">Manage public stocking records</p>
                            </div>
                            <a href="{{ route('crm.public-stockings.create') }}" 
                               class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add New Record
                            </a>
                        </div>

                        <!-- Success/Error Messages -->
                        <div x-show="message" x-transition class="mb-4">
                            <div x-show="messageType === 'success'" class="alert alert-success">
                                <span x-text="message"></span>
                            </div>
                            <div x-show="messageType === 'error'" class="alert alert-error">
                                <span x-text="message"></span>
                            </div>
                        </div>


                        @if(session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-error mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b border-slate-200 dark:border-navy-500">
                                    <tr>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">ID</th>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Species</th>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">No.</th>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Water Body Name</th>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Created At</th>
                                        <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 dark:divide-navy-500">
                                    @forelse($publicStockings as $stocking)
                                        <tr x-data="{ isDeleting: false }" x-show="!isDeleting" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="hover:bg-slate-50 dark:hover:bg-navy-600 transition-colors">
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-navy-50">{{ $stocking->id }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-900 dark:text-navy-50">{{ $stocking->species }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-900 dark:text-navy-50">{{ $stocking->no }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-900 dark:text-navy-50">{{ $stocking->water_body_name }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-navy-300">{{ $stocking->created_at->format('M d, Y') }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center space-x-2">
                                                    <a href="{{ route('crm.public-stockings.show', $stocking->id) }}" 
                                                       class="text-info hover:text-info-focus" title="View">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('crm.public-stockings.edit', $stocking->id) }}" 
                                                       class="text-primary hover:text-primary-focus" title="Edit">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <button type="button" 
                                                            @click="deleteRecord({{ $stocking->id }}, $el.closest('tr'))"
                                                            :disabled="isDeleting"
                                                            class="text-error hover:text-error-focus disabled:opacity-50" title="Delete">
                                                        <svg x-show="!isDeleting" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        <svg x-show="isDeleting" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-4 py-12 text-center">
                                                <div class="text-slate-500 dark:text-navy-300">
                                                    <svg class="w-12 h-12 mx-auto mb-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 009.586 13H7"></path>
                                                    </svg>
                                                    <p class="text-lg font-medium">No public stocking records found</p>
                                                    <p class="text-sm">Get started by creating your first record.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($publicStockings->hasPages())
                            <div class="mt-6">
                                {{ $publicStockings->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function publicStockingIndex() {
            return {
                message: '',
                messageType: '',
                isDeleting: false,

                showMessage(text, type) {
                    this.message = text;
                    this.messageType = type;
                    setTimeout(() => {
                        this.message = '';
                        this.messageType = '';
                    }, 5000);
                },

                async deleteRecord(id, rowElement) {
                    // Get the Alpine.js component for this row
                    const rowComponent = Alpine.$data(rowElement);
                    rowComponent.isDeleting = true;
                    
                    try {
                        const response = await axios.delete(`/crm/public-stockings/${id}`, {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (response.data.success) {
                            this.showMessage('Record deleted successfully!', 'success');
                            
                            // Hide the row with animation
                            rowComponent.isDeleting = true;
                            
                            // Remove the row from DOM after animation
                            setTimeout(() => {
                                rowElement.remove();
                            }, 300);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        rowComponent.isDeleting = false;
                        
                        if (error.response && error.response.data.message) {
                            this.showMessage(error.response.data.message, 'error');
                        } else {
                            this.showMessage('An error occurred while deleting the record.', 'error');
                        }
                    }
                }
            }
        }
    </script>
</x-app-layout>
