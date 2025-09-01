<x-app-layout title="Slider Management" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Slider Management
            </h3>
            <a href="{{ route('cms.sliders.create') }}"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Slider</span>
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
                                <th class="whitespace-nowrap">Image</th>
                                <th class="whitespace-nowrap">Title</th>
                                <th class="whitespace-nowrap">Subtitle</th>
                                <th class="whitespace-nowrap">Order</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $slider)
                                <tr>
                                    <td class="whitespace-nowrap">
                                        <div class="avatar size-16">
                                            <img class="rounded-lg object-cover" src="{{ $slider->image_url }}" alt="{{ $slider->title }}">
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="font-medium text-slate-700 dark:text-navy-100">{{ $slider->title ?: 'No Title' }}</div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="text-slate-500 dark:text-navy-300">{{ $slider->subtitle ?: 'No Subtitle' }}</div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="badge rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                                            {{ $slider->order }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        @if($slider->is_active)
                                            <div class="badge rounded-full bg-success/10 text-success">
                                                Active
                                            </div>
                                        @else
                                            <div class="badge rounded-full bg-error/10 text-error">
                                                Inactive
                                            </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('cms.sliders.edit', $slider->id) }}"
                                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            
                                            <form action="{{ route('cms.sliders.toggle-status', $slider->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    @if($slider->is_active)
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                                        </svg>
                                                    @else
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    @endif
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('cms.sliders.destroy', $slider->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this slider?')">
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
                                    <td colspan="6" class="text-center py-8">
                                        <div class="text-slate-500 dark:text-navy-300">
                                            <svg class="size-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <p class="text-lg font-medium">No sliders found</p>
                                            <p class="text-sm">Create your first slider to get started</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($sliders->hasPages())
                    <div class="mt-6">
                        {{ $sliders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
