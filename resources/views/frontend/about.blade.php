@extends('frontend.layouts.app')

@section('title', 'About — Department of Fisheries, Government of the Punjab')

@section('content')

  {{-- Banner --}}
  <section class="px-3">
    <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
      <div class="relative z-[1]">
        <h2 class="mb-5">{{ __('about.banner_title') }}</h2>
        <div class="flex justify-center items-center gap-2">
          <a href="{{ url('/') }}">{{ __('about.breadcrumb_home') }}</a> >
          <span class="text-primary-300">{{ __('about.breadcrumb_about') }}</span>
        </div>
      </div>
    </div>
  </section>

  {{-- “Mission & Role” from official site --}}
  <section class="bg-neutral-0 relative py-120">
    <div class="cont grid grid-cols-12 gap-6">
      <div class="col-span-12 md:col-span-6">
        <p class="sub-heading">{{ __('about.mission') }}</p>
        <h2>{{ __('about.mission_title') }}</h2>
        <p class="mt-4 max-w-2xl">
          {{ __('about.mission_desc') }}
        </p>
        <div class="mt-6 flex gap-3">
          <a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="btn-secondary">{{ __('about.directorate_link') }}</a>
          <a href="https://fisheries.punjab.gov.pk/overview" target="_blank" rel="noopener" class="btn-primary">{{ __('about.department_overview') }}</a>
        </div>
      </div>

      {{-- Quick Links to public services --}}
      <div class="col-span-12 md:col-span-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener">
            <h4 class="mb-2">{{ __('about.soil_water_title') }}</h4>
            <p>{{ __('about.soil_water_desc') }}</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener">
            <h4 class="mb-2">{{ __('about.angling_title') }}</h4>
            <p>{{ __('about.angling_desc') }}</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/management-of-fisheries-resources" target="_blank" rel="noopener">
            <h4 class="mb-2">{{ __('about.management_title') }}</h4>
            <p>{{ __('about.management_desc') }}</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener">
            <h4 class="mb-2">{{ __('about.regional_title') }}</h4>
            <p>{{ __('about.regional_desc') }}</p>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Projects slider - official initiatives --}}
  <section class="bg-primary-50 relative py-120">
    <div class="cont">
      <div class="grid grid-cols-12 gap-4 mb-10 xl:mb-14">
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <p class="sub-heading">{{ __('about.projects') }}</p>
          <h2>{{ __('about.projects_heading') }}</h2>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-8 flex items-end">
          <div>
            <p class="mb-5 xl:mb-7">{{ __('about.projects_desc') }}</p>
            <a href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener" class="btn-secondary">{{ __('about.projects_view_all') }}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="swiper portfolioSlider2 max-lg:px-3">
      <div class="swiper-wrapper">
        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/genetic-improvement.jpg') }}" class="rounded-xl w-full" alt="Genetic Improvement of Culturable Fish Species" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">{{ __('about.proj1_title') }}</h4>
            <p>{{ __('about.proj1_desc') }}</p>
            <a href="https://fisheries.punjab.gov.pk/projects" class="link" target="_blank" rel="noopener">{{ __('about.proj1_learn_more') }}</a>
          </div>
        </div>

        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/shrimp-cluster.jpg') }}" class="rounded-xl w-full" alt="Pilot Shrimp Farming Cluster" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">{{ __('about.proj2_title') }}</h4>
            <p>{{ __('about.proj2_desc') }}</p>
            <a href="https://fisheries.punjab.gov.pk/shrimp_culture" class="link" target="_blank" rel="noopener">{{ __('about.proj2_link') }}</a>
          </div>
        </div>

        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/cage-culture.jpg') }}" class="rounded-xl w-full" alt="Cage Culture & Reservoir Fisheries" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">{{ __('about.proj3_title') }}</h4>
            <p>{{ __('about.proj3_desc') }}</p>
            <a href="https://fisheries.punjab.gov.pk/projects" class="link" target="_blank" rel="noopener">{{ __('about.proj3_learn_more') }}</a>
          </div>
        </div>
      </div>
      <div class="portfolio-pagination mt-6 flex justify-center"></div>
    </div>
  </section>

  {{-- Key Functions --}}
  <section class="bg-neutral-0 relative py-120">
    <div class="cont">
      <div class="grid grid-cols-12 gap-4 mb-10 xl:mb-14">
        <div class="col-span-12 md:col-span-6">
          <p class="sub-heading">{{ __('about.key_functions') }}</p>
          <h2>{{ __('about.how_serves') }}</h2>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-8">
          <p>{{ __('about.functions_intro') }}</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 xl:gap-6">
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">01</span>
          <div>
            <h4 class="mb-2">{{ __('about.func1_title') }}</h4>
            <p>{{ __('about.func1_desc') }}</p>
          </div>
        </div>
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">02</span>
          <div>
            <h4 class="mb-2">{{ __('about.func2_title') }}</h4>
            <p>{{ __('about.func2_desc') }}</p>
          </div>
        </div>
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">03</span>
          <div>
            <h4 class="mb-2">{{ __('about.func3_title') }}</h4>
            <p>{{ __('about.func3_desc') }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Skills / Capability (repurposed to Institutes) --}}
  <section class="bg-primary-50 py-120">
    <div class="cont grid grid-cols-12 gap-6 items-center">
      <div class="col-span-12 lg:col-span-5">
        <p class="sub-heading">{{ __('about.institutes') }}</p>
        <h2 class="mb-6">{{ __('about.institutes_heading') }}</h2>
        <p class="mb-5 xl:mb-8">{{ __('about.institutes_desc') }}</p>
        <div class="flex gap-3">
          <a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="btn-secondary">{{ __('about.directorate_portal') }}</a>
          <a href="https://fisheries.punjab.gov.pk/" target="_blank" rel="noopener" class="btn-primary">{{ __('about.department_portal') }}</a>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-7 xxl:col-span-6 xxl:col-start-7 flex flex-wrap justify-center items-center gap-6">
        <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="95" data-bg-color="#f5f5f5">
          <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
          <div class="text-center z-[2]">
            <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
            <span class="text-neutral-400">{{ __('about.labs') }}</span>
          </div>
        </div>
        <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="90" data-bg-color="#f5f5f5">
          <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
          <div class="text-center z-[2]">
            <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
            <span class="text-neutral-400">{{ __('about.training_extension') }}</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Contact --}}
  <section id="contact" class="py-120 bg-neutral-0 relative">
    <div class="cont grid grid-cols-12 gap-6 items-center">
      <div class="col-span-12 md:col-span-5">
        <p class="sub-heading">{{ __('about.contact') }}</p>
        <h2 class="mb-6 xl:mb-8">{{ __('about.contact_heading') }}</h2>

        <div class="space-y-4 xl:space-y-6 max-w-sm">
          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Z"/></svg>
            </span>
            <p class="font-medium">9-A Bahawalpur Road, Chauburji, Lahore, Pakistan</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M144.27,45.93a8,8,0,0,1,9.8-5.66..."/></svg>
            </span>
            <p class="font-medium">(042) 99212374–75</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216..."/></svg>
            </span>
            <p class="font-medium"><a href="mailto:fishdept@hotmail.com">fishdept@hotmail.com</a></p>
          </div>
        </div>
      </div>

      <div class="col-span-12 md:col-span-7 xxl:col-start-6 flex items-center">
        <iframe
          src="https://www.google.com/maps?q=9-A%20Bahawalpur%20Road%20Chauburji%20Lahore&output=embed"
          class="max-lg:hidden rounded-s-xl w-[220px] xl:w-[330px] h-[350px] xl:h-[450px]"
          style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <form action="#" method="post" class="p-4 md:p-6 xl:py-10 xxl:py-[60px] bg-primary-50 rounded-xl">
          @csrf
          <h2 class="mb-5 xl:mb-7">{{ __('about.send_us_message') }}</h2>
          <div class="space-y-4 mb-6 xl:mb-10">
            <input type="text" name="name" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="{{ __('home.full_name') }}" />
            <input type="email" name="email" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="{{ __('common.email') }}" />
            <textarea name="message" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="{{ __('common.message') }}..." rows="5"></textarea>
          </div>
          <button class="btn-primary" type="submit">{{ __('about.send_message') }}</button>
        </form>
      </div>
    </div>
  </section>

@endsection
