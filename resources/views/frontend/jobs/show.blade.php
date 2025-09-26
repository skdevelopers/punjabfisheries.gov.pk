@extends('frontend.layouts.app')

@section('title', $job->title . ' - Department of Fisheries Punjab')

@section('content')

    <!-- Page Header -->
    <section class="pt-32 pb-20 bg-primary-50">
      <div class="cont">
        <div class="text-center">
          <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-4">{{ $job->title }}</h1>
          <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Career Opportunity at Department of Fisheries Punjab</p>
        </div>
      </div>
    </section>

    <!-- Job Details Section -->
    <section class="py-16 xl:py-20">
      <div class="cont">
        <div class="max-w-4xl mx-auto">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Job Header -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 p-8 text-white">
              <div class="flex items-start justify-between">
                <div class="flex-1">
                  <h2 class="text-3xl font-bold mb-4">{{ $job->title }}</h2>
                  <div class="flex flex-wrap gap-4 text-sm">
                    @if($job->department)
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Z"></path>
                        </svg>
                        <span>{{ $job->department }}</span>
                      </div>
                    @endif
                    @if($job->location)
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path>
                        </svg>
                        <span>{{ $job->location }}</span>
                      </div>
                    @endif
                    @if($job->employment_type)
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                        </svg>
                        <span>{{ $job->employment_type }}</span>
                      </div>
                    @endif
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                      </svg>
                      <span>Posted: {{ $job->created_at->format('M d, Y') }}</span>
                    </div>
                  </div>
                </div>
                <div class="ml-6">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    @if($job->status === 'open') bg-green-100 text-green-800
                    @elseif($job->status === 'closed') bg-red-100 text-red-800
                    @else bg-gray-100 text-gray-800
                    @endif">
                    {{ ucfirst($job->status) }}
                  </span>
                </div>
              </div>
            </div>

            <!-- Job Content -->
            <div class="p-8">
              <div class="prose max-w-none">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Job Description</h3>
                <div class="text-gray-700 leading-relaxed">
                  {!! nl2br(e($job->description)) !!}
                </div>

                @if($job->requirements)
                  <h3 class="text-2xl font-semibold text-gray-900 mb-4 mt-8">Requirements</h3>
                  <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->requirements)) !!}
                  </div>
                @endif

                @if($job->responsibilities)
                  <h3 class="text-2xl font-semibold text-gray-900 mb-4 mt-8">Responsibilities</h3>
                  <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->responsibilities)) !!}
                  </div>
                @endif

                @if($job->benefits)
                  <h3 class="text-2xl font-semibold text-gray-900 mb-4 mt-8">Benefits</h3>
                  <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($job->benefits)) !!}
                  </div>
                @endif
              </div>

              <!-- Action Buttons -->
              <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row gap-4">
                  @if($job->hasAttachment())
                    <a href="{{ $job->attachment_url }}" 
                       target="_blank" 
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M208,88H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Z"></path>
                      </svg>
                      Download Job Advertisement ({{ strtoupper($job->attachment_type) }})
                    </a>
                  @endif
                  
                  <a href="{{ route('frontend.jobs') }}" 
                     class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Z"></path>
                    </svg>
                    Back to All Jobs
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection