{{-- Slider Component - Displays dynamic sliders from database --}}
@props(['sliders' => collect()])

<section class="relative overflow-x-hidden">
    <div class="swiper banner1Slider relative">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
                <div class="swiper-slide">
                    <div class="relative after:size-full after:bg-gradient-to-b after:from-black after:to-transparent after:absolute after:inset-0 bg-no-repeat bg-cover py-40 px-3 md:py-56 xl:py-[290px] text-center bg-center" 
                         data-bg="{{ $slider->image_url }}"
                         @if($slider->background_color)
                             style="background-color: {{ $slider->background_color }};"
                         @endif>
                        <div class="flex flex-col items-center relative z-[1]">
                            @if($slider->subtitle)
                                <p class="font-medium text-lg text-secondary mb-2 split_anim" 
                                   @if($slider->text_color)
                                       style="color: {{ $slider->text_color }};"
                                   @endif>
                                    {{ $slider->subtitle }}
                                </p>
                            @endif
                            
                            @if($slider->title)
                                <h2 class="split_anim text-4xl uppercase font-playfair font-bold md:text-6xl lg:text-7xl xl:text-9xl xxl:text-[140px] text-neutral-0 mb-6"
                                    @if($slider->text_color)
                                        style="color: {{ $slider->text_color }};"
                                    @endif>
                                    {{ $slider->title }}
                                </h2>
                            @endif
                            
                            @if($slider->description)
                                <p data-delay=".3" class="reveal_anim max-w-[630px] mx-auto font-medium mb-7 xl:mb-10 text-neutral-0"
                                   @if($slider->text_color)
                                       style="color: {{ $slider->text_color }};"
                                   @endif>
                                    {{ $slider->description }}
                                </p>
                            @endif
                            
                            @if($slider->button_text && $slider->button_url)
                                <div class="fade_anim">
                                    <a href="{{ $slider->button_url }}" class="btn-secondary">
                                        {{ $slider->button_text }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                {{-- Default slider if no sliders are configured --}}
                <div class="swiper-slide">
                    <div class="relative after:size-full after:bg-gradient-to-b after:from-black after:to-transparent after:absolute after:inset-0 bg-no-repeat bg-cover py-40 px-3 md:py-56 xl:py-[290px] text-center bg-center" 
                         data-bg="{{ asset('assets/images/home-1/banner-1.webp') }}">
                        <div class="flex flex-col items-center relative z-[1]">
                            <p class="font-medium text-lg text-secondary mb-2 split_anim">
                                FISHING MAKES ME CRAZY
                            </p>
                            <h2 class="split_anim text-4xl uppercase font-playfair font-bold md:text-6xl lg:text-7xl xl:text-9xl xxl:text-[140px] text-neutral-0 mb-6">
                                Fresh Fisheries
                            </h2>
                            <p data-delay=".3" class="reveal_anim max-w-[630px] mx-auto font-medium mb-7 xl:mb-10 text-neutral-0">
                                Fresh Fisheries delivers premium, sustainable seafood through innovative aqua farming and expert fishery services.
                            </p>
                            <div class="fade_anim">
                                <a href="#" class="btn-secondary">
                                    Get A Quote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="banner1-pagination flex justify-center z-[2] absolute !bottom-8 xl:!bottom-14"></div>
    </div>
</section>
