<x-app-layout title="Announcements - Department of Fisheries - Punjab">

    <!-- Banner section start -->
    <section class="px-3">
      <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
        <div class="relative z-[1]">
          <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-6">Announcements</h1>
          <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Stay updated with the latest news, notices, and important announcements from the Department of Fisheries - Punjab.</p>
        </div>
      </div>
    </section>
    <!-- Banner section end -->

    <!-- Announcements Section -->
    <section class="py-16 xl:py-20">
      <div class="cont">
        @if($announcements->count() > 0)
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
            @foreach($announcements as $announcement)
              <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @if($announcement->featured_image)
                  <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ Storage::url($announcement->featured_image) }}" 
                         alt="{{ $announcement->title }}" 
                         class="w-full h-48 object-cover">
                  </div>
                @endif
                
                <div class="p-6">
                  <div class="flex items-center justify-between mb-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                      @if($announcement->priority === 'high') bg-red-100 text-red-800
                      @elseif($announcement->priority === 'medium') bg-yellow-100 text-yellow-800
                      @else bg-green-100 text-green-800
                      @endif">
                      {{ ucfirst($announcement->priority) }} Priority
                    </span>
                    <span class="text-sm text-gray-500">{{ $announcement->created_at->format('M d, Y') }}</span>
                  </div>
                  
                  <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">
                    {{ $announcement->title }}
                  </h3>
                  
                  <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ Str::limit(strip_tags($announcement->content), 120) }}
                  </p>
                  
                  <div class="flex items-center justify-between">
                    <a href="{{ route('frontend.announcements.show', $announcement) }}" 
                       class="inline-flex items-center text-primary-600 hover:text-primary-800 font-medium text-sm">
                      Read More
                      <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                      </svg>
                    </a>
                    
                    @if($announcement->is_pinned)
                      <span class="inline-flex items-center text-yellow-600 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M235.33,139.31l-52-20a8,8,0,0,0-7.28.89L168,130.5V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v90.5L80,120.2a8,8,0,0,0-7.28-.89l-52,20A8,8,0,0,0,24,136v40a16,16,0,0,0,16,16H96a8,8,0,0,0,8-8V88h48v80a8,8,0,0,0,8,8h56a16,16,0,0,0,16-16V136A8,8,0,0,0,235.33,139.31Z"></path>
                        </svg>
                        Pinned
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          
          <!-- Pagination -->
          <div class="mt-12 flex justify-center">
            {{ $announcements->links() }}
          </div>
        @else
          <div class="text-center py-20">
            <div class="mb-8">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">No Announcements Available</h3>
            <p class="text-gray-500 mb-8">We currently don't have any announcements. Please check back later for updates.</p>
            <a href="{{ route('frontend.contact') }}" class="btn-primary">Contact Us</a>
          </div>
        @endif
      </div>
    </section>

</x-app-layout>