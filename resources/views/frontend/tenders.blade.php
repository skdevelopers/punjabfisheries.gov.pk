<x-app-layout title="Tenders - Department of Fisheries - Punjab">

  <!-- Page Header -->
  <section class="pt-32 pb-20 bg-primary-50">
    <div class="cont">
      <div class="text-center">
        <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-4">Tenders</h1>
        <p class="text-lg text-neutral-600 max-w-2xl mx-auto">View current tenders and procurement opportunities from the Department of Fisheries - Punjab.</p>
      </div>
    </div>
  </section>

  <!-- Tenders Section -->
  <section class="py-16 xl:py-20">
    <div class="cont">
      @if(isset($tenders) && $tenders->count() > 0)
        <div class="space-y-6">
          @foreach($tenders as $tender)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
              <div class="flex items-start justify-between">
                <div class="flex-1">
                  <div class="flex items-center gap-2 mb-3">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $tender->title }}</h3>
                    @if($tender->is_urgent)
                      <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">URGENT</span>
                    @endif
                  </div>
                  
                  <div class="text-sm text-gray-600 mb-3">
                    <div class="flex flex-wrap gap-4">
                      <span><strong>Tender No:</strong> {{ $tender->tender_number }}</span>
                      <span><strong>Published:</strong> {{ $tender->published_at->format('M d, Y') }}</span>
                      <span><strong>Closing:</strong> {{ $tender->closing_at->format('M d, Y') }}</span>
                      @if($tender->estimated_value)
                        <span><strong>Value:</strong> {{ $tender->estimated_value }}</span>
                      @endif
                    </div>
                  </div>
                  
                  <p class="text-gray-700 mb-4">{{ Str::limit($tender->description, 200) }}</p>
                  
                  <div class="flex items-center gap-4">
                    <a href="{{ route('frontend.tenders.show', $tender) }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center gap-1">
                      View Details
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path>
                      </svg>
                    </a>
                    
                    @if($tender->document_path)
                      <a href="{{ Storage::url($tender->document_path) }}" 
                         target="_blank" 
                         class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M208,88H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Z"></path>
                        </svg>
                        Download Tender Document
                      </a>
                    @endif
                  </div>
                </div>
                
                <div class="ml-4">
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                    @if($tender->status === 'open') bg-green-100 text-green-800
                    @elseif($tender->status === 'closed') bg-red-100 text-red-800
                    @elseif($tender->status === 'awarded') bg-blue-100 text-blue-800
                    @else bg-gray-100 text-gray-800
                    @endif">
                    {{ ucfirst($tender->status) }}
                  </span>
                  
                  @if($tender->closing_at->isFuture())
                    <div class="text-xs text-gray-500 mt-2">
                      {{ $tender->closing_at->diffForHumans() }} left
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
          {{ $tenders->links() }}
        </div>
      @else
        <div class="text-center py-20">
          <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <h3 class="text-2xl font-semibold text-gray-700 mb-4">No Tenders Available</h3>
          <p class="text-gray-500 mb-8">We currently don't have any active tenders. Please check back later for new opportunities.</p>
          <a href="{{ route('frontend.contact') }}" class="btn-primary">Contact Us</a>
        </div>
      @endif
    </div>
  </section>

</x-app-layout>