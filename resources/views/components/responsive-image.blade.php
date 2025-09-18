@props([
    'media' => null,
    'conversion' => '',
    'size' => 'medium',
    'alt' => null,
    'class' => 'img-fluid',
    'loading' => 'lazy',
    'sizes' => '(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw',
    'usePicture' => false,
    'webp' => true,
    'attributes' => []
])

@if($media)
    @php
        $altText = $alt ?? $media->alt_text ?? $media->name;
        $allAttributes = array_merge([
            'alt' => $altText,
            'loading' => $loading,
            'class' => $class,
        ], $attributes);
        
        // Map size to conversion
        $conversionMap = [
            'thumbnail' => 'thumb',
            'small' => 'small', 
            'medium' => 'medium',
            'large' => 'large',
            'xlarge' => 'xlarge',
            'square' => 'square',
            'avatar' => 'avatar',
            'hero' => 'hero',
        ];
        
        $finalConversion = $conversion ?: ($conversionMap[$size] ?? 'medium');
    @endphp

    @if($usePicture && $webp)
        {{-- Picture element with WebP support --}}
        <picture>
            @if($media->hasGeneratedConversion($finalConversion . '_webp'))
                <source srcset="{{ $media->getUrl($finalConversion . '_webp') }}" type="image/webp">
            @endif
            <img 
                src="{{ $media->getUrl($finalConversion) }}" 
                @if($media->getResponsiveImageUrls($finalConversion))
                    srcset="{{ collect($media->getResponsiveImageUrls($finalConversion))->map(function($url, $width) { return $url . ' ' . $width . 'w'; })->join(', ') }}"
                @endif
                sizes="{{ $sizes }}"
                @foreach($allAttributes as $key => $value)
                    {{ $key }}="{{ $value }}"
                @endforeach
            >
        </picture>
    @else
        {{-- Regular img element with srcset --}}
        <img 
            src="{{ $media->getUrl($finalConversion) }}" 
            @if($media->getResponsiveImageUrls($finalConversion))
                srcset="{{ collect($media->getResponsiveImageUrls($finalConversion))->map(function($url, $width) { return $url . ' ' . $width . 'w'; })->join(', ') }}"
            @endif
            sizes="{{ $sizes }}"
            @foreach($allAttributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
        >
    @endif
@else
    {{-- Fallback for missing media --}}
    <img 
        src="{{ asset('images/app-logo.svg') }}" 
        alt="Image not found"
        class="{{ $class }}"
        loading="{{ $loading }}"
    >
@endif
