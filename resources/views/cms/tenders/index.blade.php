<x-app-layout title="Tender Management" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Tender Management
            </h3>
            <a href="{{ route('cms.tenders.create') }}"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Tender</span>
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success mb-4">
                <div class="flex items-center space-x-2">
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="p-4 sm:p-5">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Tender Number</th>
                                <th class="whitespace-nowrap">Title</th>
                                <th class="whitespace-nowrap">Deadline</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Published</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tenders as $tender)
                                <tr>
                                    <td class="whitespace-nowrap">
                                        <div class="font-medium text-slate-700 dark:text-navy-100">{{ $tender->tender_number }}</div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="font-medium text-slate-700 dark:text-navy-100">{{ Str::limit($tender->title, 50) }}</div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="text-slate-600 dark:text-navy-300">{{ $tender->formatted_deadline }}</div>
                                        @if($tender->is_expired)
                                            <span class="text-xs text-red-500">Expired</span>
                                        @else
                                            <span class="text-xs text-green-500">{{ $tender->days_until_deadline }} days left</span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <span class="badge 
                                            @if($tender->status === 'active') bg-success/10 text-success
                                            @elseif($tender->status === 'closed') bg-warning/10 text-warning
                                            @else bg-error/10 text-error
                                            @endif">
                                            {{ ucfirst($tender->status) }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <span class="badge {{ $tender->is_published ? 'bg-success/10 text-success' : 'bg-warning/10 text-warning' }}">
                                            {{ $tender->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('cms.tenders.show', $tender->id) }}"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('cms.tenders.edit', $tender->id) }}"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('cms.tenders.toggle-status', $tender->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    @if($tender->is_published)
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                                        </svg>
                                                    @else
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    @endif
                                                </button>
                                            </form>
                                            @if($tender->pdf_path)
                                                <a href="{{ route('cms.tenders.download-pdf', $tender->id) }}"
                                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                            <form action="{{ route('cms.tenders.destroy', $tender->id) }}" method="POST" class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this tender?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
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
                                    <td colspan="7" class="text-center py-8 text-slate-500 dark:text-navy-300">
                                        No tenders found. <a href="{{ route('cms.tenders.create') }}" class="text-primary hover:underline">Create your first tender</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($tenders->hasPages())
                    <div class="mt-4">
                        {{ $tenders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
