<?php

namespace App\Traits;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait ResponsiveImageHelper
{
    /**
     * Generate responsive image HTML with srcset
     */
    public function getResponsiveImage(Media $media, string $conversion = '', array $attributes = []): string
    {
        if (!$media) {
            return '';
        }

        $defaultAttributes = [
            'alt' => $media->alt_text ?? $media->name,
            'loading' => 'lazy',
            'class' => 'img-fluid',
        ];

        $attributes = array_merge($defaultAttributes, $attributes);

        // Get the main image URL
        $src = $conversion ? $media->getUrl($conversion) : $media->getUrl();

        // Build srcset for responsive images
        $srcset = $this->buildSrcset($media, $conversion);

        // Build attributes string
        $attributeString = '';
        foreach ($attributes as $key => $value) {
            $attributeString .= " {$key}=\"" . htmlspecialchars($value) . "\"";
        }

        return "<img src=\"{$src}\" srcset=\"{$srcset}\" sizes=\"(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw\"{$attributeString}>";
    }

    /**
     * Build srcset string for responsive images
     */
    protected function buildSrcset(Media $media, string $conversion = ''): string
    {
        $srcset = [];
        
        // Get responsive image URLs
        $responsiveImages = $conversion 
            ? $media->getResponsiveImageUrls($conversion)
            : $media->getResponsiveImageUrls();

        foreach ($responsiveImages as $width => $url) {
            $srcset[] = "{$url} {$width}w";
        }

        return implode(', ', $srcset);
    }

    /**
     * Generate picture element with multiple sources
     */
    public function getPictureElement(Media $media, string $conversion = '', array $sources = []): string
    {
        if (!$media) {
            return '';
        }

        $defaultSources = [
            'webp' => $conversion ? $media->getUrl($conversion . '_webp') : $media->getUrl('webp'),
            'jpeg' => $conversion ? $media->getUrl($conversion) : $media->getUrl(),
        ];

        $sources = array_merge($defaultSources, $sources);

        $picture = '<picture>';
        
        // Add source elements
        foreach ($sources as $format => $url) {
            if ($url) {
                $srcset = $this->buildSrcset($media, $conversion);
                $picture .= "<source srcset=\"{$srcset}\" type=\"image/{$format}\">";
            }
        }

        // Add fallback img element
        $picture .= $this->getResponsiveImage($media, $conversion);
        $picture .= '</picture>';

        return $picture;
    }

    /**
     * Get image with specific size
     */
    public function getImage(Media $media, string $size = 'medium', array $attributes = []): string
    {
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

        $conversion = $conversionMap[$size] ?? 'medium';
        return $this->getResponsiveImage($media, $conversion, $attributes);
    }

    /**
     * Get image URL for specific size
     */
    public function getImageUrl(Media $media, string $size = 'medium'): string
    {
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

        $conversion = $conversionMap[$size] ?? 'medium';
        return $media->getUrl($conversion);
    }

    /**
     * Get all available image sizes for a media item
     */
    public function getAvailableSizes(Media $media): array
    {
        $sizes = [];
        $conversions = ['thumb', 'small', 'medium', 'large', 'xlarge', 'square', 'avatar', 'hero'];

        foreach ($conversions as $conversion) {
            if ($media->hasGeneratedConversion($conversion)) {
                $sizes[$conversion] = [
                    'url' => $media->getUrl($conversion),
                    'width' => $this->getImageWidth($media, $conversion),
                    'height' => $this->getImageHeight($media, $conversion),
                ];
            }
        }

        return $sizes;
    }

    /**
     * Get image width for conversion
     */
    protected function getImageWidth(Media $media, string $conversion): ?int
    {
        // This would need to be implemented based on your conversion settings
        // For now, return null as we don't have direct access to conversion dimensions
        return null;
    }

    /**
     * Get image height for conversion
     */
    protected function getImageHeight(Media $media, string $conversion): ?int
    {
        // This would need to be implemented based on your conversion settings
        // For now, return null as we don't have direct access to conversion dimensions
        return null;
    }

    /**
     * Generate WordPress-style image shortcode
     */
    public function getImageShortcode(Media $media, string $size = 'medium', array $attributes = []): string
    {
        $url = $this->getImageUrl($media, $size);
        $alt = $media->alt_text ?? $media->name;
        $class = $attributes['class'] ?? '';
        $width = $attributes['width'] ?? '';
        $height = $attributes['height'] ?? '';

        $shortcode = "[img src=\"{$url}\" alt=\"{$alt}\"";
        
        if ($class) {
            $shortcode .= " class=\"{$class}\"";
        }
        if ($width) {
            $shortcode .= " width=\"{$width}\"";
        }
        if ($height) {
            $shortcode .= " height=\"{$height}\"";
        }

        $shortcode .= "]";

        return $shortcode;
    }
}
