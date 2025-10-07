{{-- Slider Component - Displays dynamic sliders from database --}}
@props(['sliders' => collect()])

@php($isUr = \Illuminate\Support\Str::startsWith(app()->getLocale(), 'ur'))
@php($splitClass = $isUr ? '' : 'split_anim')
@php($upperClass = $isUr ? '' : 'uppercase')

<section class="relative overflow-x-hidden" dir="{{ app()->getLocale() === 'ur' ? 'rtl' : 'ltr' }}">
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
@php($subtitle = $slider->t('subtitle'))
                            @if($subtitle)
                                <p class="font-medium text-lg text-secondary mb-2 {{ $splitClass }}" 
                                   @if($slider->text_color)
                                       style="color: {{ $slider->text_color }};"
                                   @endif>
                                    {{ $subtitle }}
                                </p>
                            @endif
                            
@php($title = $slider->t('title'))
                            @if($title)
                                <h2 class="text-4xl {{ $upperClass }} font-playfair font-bold md:text-6xl lg:text-7xl xl:text-9xl xxl:text-[140px] text-neutral-0 mb-6"
                                    @if($slider->text_color)
                                        style="color: {{ $slider->text_color }};"
                                    @endif>
                                    {{ $title }}
                                </h2>
                            @endif
                            
@php($desc = $slider->t('description'))
                            @if($desc)
                                <p data-delay=",3" class="reveal_anim max-w-[630px] mx-auto font-medium mb-7 xl:mb-10 text-neutral-0"
                                   @if($slider->text_color)
                                       style="color: {{ $slider->text_color }};"
                                   @endif>
                                    {{ $desc }}
                                </p>
                            @endif
                            
@php($btnText = $slider->t('button_text'))
                            @if($btnText && $slider->button_url)
                                <div class="fade_anim">
                                    <a href="{{ $slider->button_url }}" class="btn-secondary">
                                        {{ $btnText }}
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
<p class="font-medium text-lg text-secondary mb-2 {{ $splitClass }}">
                                {{ __('home.slider_default_subtitle') }}
                            </p>
                            <h2 class="text-4xl {{ $upperClass }} font-playfair font-bold md:text-6xl lg:text-7xl xl:text-9xl xxl:text-[140px] text-neutral-0 mb-6">
                                {{ __('home.slider_default_title') }}
                            </h2>
                            <p data-delay=",3" class="reveal_anim max-w-[630px] mx-auto font-medium mb-7 xl:mb-10 text-neutral-0">
                                {{ __('home.slider_default_description') }}
                            </p>
                            <div class="fade_anim">
                                <a href="#" class="btn-secondary">
                                    {{ __('home.slider_default_button') }}
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
