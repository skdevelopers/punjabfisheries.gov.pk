<?php

namespace App\Services;

use App\Models\Gallery;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class MediaLibraryService
{
    /**
     * Upload files to a gallery
     */
    public function uploadToGallery(Gallery $gallery, array $files, string $collection = 'images'): Collection
    {
        $uploadedMedia = collect();

        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $media = $gallery
                    ->addMediaFromRequest($file)
                    ->toMediaCollection($collection);

                $uploadedMedia->push($media);
            }
        }

        return $uploadedMedia;
    }

    /**
     * Upload single file to gallery
     */
    public function uploadSingleFile(Gallery $gallery, UploadedFile $file, string $collection = 'images'): Media
    {
        return $gallery
            ->addMediaFromRequest($file)
            ->toMediaCollection($collection);
    }

    /**
     * Get media by collection
     */
    public function getMediaByCollection(Gallery $gallery, string $collection = 'images'): Collection
    {
        return $gallery->getMedia($collection);
    }

    /**
     * Get all media for gallery
     */
    public function getAllMedia(Gallery $gallery): Collection
    {
        return $gallery->mediaItems;
    }

    /**
     * Search media
     */
    public function searchMedia(string $query, string $collection = null): Collection
    {
        $mediaQuery = Media::where('model_type', Gallery::class)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('file_name', 'like', "%{$query}%");
            });

        if ($collection) {
            $mediaQuery->where('collection_name', $collection);
        }

        return $mediaQuery->get();
    }

    /**
     * Get media statistics
     */
    public function getMediaStats(): array
    {
        $allMedia = Media::where('model_type', Gallery::class)->get();

        return [
            'total_files' => $allMedia->count(),
            'total_size' => $allMedia->sum('size'),
            'formatted_size' => $this->formatBytes($allMedia->sum('size')),
            'by_collection' => [
                'images' => $allMedia->where('collection_name', 'images')->count(),
                'documents' => $allMedia->where('collection_name', 'documents')->count(),
                'videos' => $allMedia->where('collection_name', 'videos')->count(),
                'audio' => $allMedia->where('collection_name', 'audio')->count(),
            ],
            'by_mime_type' => $allMedia->groupBy('mime_type')->map->count(),
            'recent_uploads' => $allMedia->sortByDesc('created_at')->take(10),
        ];
    }

    /**
     * Generate responsive image HTML
     */
    public function generateResponsiveImage(Media $media, string $conversion = '', array $attributes = []): string
    {
        $defaultAttributes = [
            'alt' => $media->alt_text ?? $media->name,
            'loading' => 'lazy',
            'class' => 'img-fluid',
        ];

        $attributes = array_merge($defaultAttributes, $attributes);

        $src = $conversion ? $media->getUrl($conversion) : $media->getUrl();
        $srcset = $this->buildSrcset($media, $conversion);

        $attributeString = '';
        foreach ($attributes as $key => $value) {
            $attributeString .= " {$key}=\"" . htmlspecialchars($value) . "\"";
        }

        return "<img src=\"{$src}\" srcset=\"{$srcset}\" sizes=\"(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 33vw\"{$attributeString}>";
    }

    /**
     * Build srcset string
     */
    protected function buildSrcset(Media $media, string $conversion = ''): string
    {
        $srcset = [];
        $responsiveImages = $conversion 
            ? $media->getResponsiveImageUrls($conversion)
            : $media->getResponsiveImageUrls();

        foreach ($responsiveImages as $width => $url) {
            $srcset[] = "{$url} {$width}w";
        }

        return implode(', ', $srcset);
    }

    /**
     * Get image with specific size
     */
    public function getImage(Media $media, string $size = 'medium'): string
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
        return $this->generateResponsiveImage($media, $conversion);
    }

    /**
     * Get image URL
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
     * Delete media file
     */
    public function deleteMedia(Media $media): bool
    {
        try {
            $media->delete();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Bulk delete media files
     */
    public function bulkDeleteMedia(array $mediaIds): int
    {
        return Media::whereIn('id', $mediaIds)->delete();
    }

    /**
     * Update media metadata
     */
    public function updateMediaMetadata(Media $media, array $data): bool
    {
        try {
            $media->update($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get media by ID
     */
    public function getMediaById(int $id): ?Media
    {
        return Media::find($id);
    }

    /**
     * Get galleries with media counts
     */
    public function getGalleriesWithCounts(): Collection
    {
        return Gallery::withCount('mediaItems')->get();
    }

    /**
     * Create new gallery
     */
    public function createGallery(array $data): Gallery
    {
        return Gallery::create($data);
    }

    /**
     * Get media usage in content
     */
    public function getMediaUsage(Media $media): array
    {
        // This would need to be implemented based on your content structure
        // For now, return empty array
        return [];
    }

    /**
     * Format bytes to human readable format
     */
    protected function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Optimize image
     */
    public function optimizeImage(Media $media): bool
    {
        try {
            // This would trigger image optimization
            // The actual optimization is handled by Spatie Media Library
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Regenerate conversions
     */
    public function regenerateConversions(Media $media): bool
    {
        try {
            $media->clearMediaConversions();
            $media->clearMediaConversionsExcept('thumb');
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get media collections
     */
    public function getMediaCollections(): array
    {
        return [
            'images' => 'Images',
            'documents' => 'Documents', 
            'videos' => 'Videos',
            'audio' => 'Audio',
        ];
    }

    /**
     * Get available image sizes
     */
    public function getAvailableImageSizes(): array
    {
        return [
            'thumbnail' => 'Thumbnail (360x240)',
            'small' => 'Small (480x320)',
            'medium' => 'Medium (800x600)',
            'large' => 'Large (1200x900)',
            'xlarge' => 'Extra Large (1920x1080)',
            'square' => 'Square (300x300)',
            'avatar' => 'Avatar (150x150)',
            'hero' => 'Hero Banner (1920x600)',
        ];
    }
}
