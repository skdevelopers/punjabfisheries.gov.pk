<?php

namespace App\Models;

use App\Traits\HasOrgScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Gallery - WordPress-like media library for images and files.
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int|null $org_unit_id
 * @property bool $is_public
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasOrgScope;

    /** @var array<int, string> */
    protected $fillable = [
        'title',
        'slug', 
        'description',
        'org_unit_id',
        'is_public'
    ];

    /** @var array<string, string> */
    protected $casts = [
        'is_public' => 'boolean',
    ];

    /**
     * Media collections for different file types
     */
    public function registerMediaCollections(): void
    {
        // Images collection - main collection for all images
        $this
            ->addMediaCollection('images')
            ->useDisk('public')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png', 
                'image/webp',
                'image/gif',
                'image/svg+xml'
            ])
            ->useFallbackUrl(url('/images/app-logo.svg'))
            ->useFallbackPath(public_path('/images/app-logo.svg'));

        // Documents collection
        $this
            ->addMediaCollection('documents')
            ->useDisk('public')
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'text/plain',
                'text/csv'
            ]);

        // Videos collection
        $this
            ->addMediaCollection('videos')
            ->useDisk('public')
            ->acceptsMimeTypes([
                'video/mp4',
                'video/webm',
                'video/ogg',
                'video/avi',
                'video/mov'
            ]);

        // Audio collection
        $this
            ->addMediaCollection('audio')
            ->useDisk('public')
            ->acceptsMimeTypes([
                'audio/mpeg',
                'audio/wav',
                'audio/ogg',
                'audio/mp4'
            ]);
    }

    /**
     * Image conversions for different use cases
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Thumbnail for admin/cards (360x240) - Force JPEG format
        $this
            ->addMediaConversion('thumb')
            ->fit(Fit::Crop, 360, 240)
            ->format('jpg')
            ->quality(85)
            ->performOnCollections('images')
            ->nonQueued();

        // Small size (480x320) - Force JPEG format
        $this
            ->addMediaConversion('small')
            ->fit(Fit::Max, 480, 320)
            ->format('jpg')
            ->quality(85)
            ->performOnCollections('images')
            ->nonQueued();

        // Medium size (800x600) - Force JPEG format
        $this
            ->addMediaConversion('medium')
            ->fit(Fit::Max, 800, 600)
            ->format('jpg')
            ->quality(90)
            ->performOnCollections('images')
            ->nonQueued();

        // Large size (1200x900) - Force JPEG format
        $this
            ->addMediaConversion('large')
            ->fit(Fit::Max, 1200, 900)
            ->format('jpg')
            ->quality(90)
            ->performOnCollections('images')
            ->nonQueued();

        // Extra large size (1920x1080) - Force JPEG format
        $this
            ->addMediaConversion('xlarge')
            ->fit(Fit::Max, 1920, 1080)
            ->format('jpg')
            ->quality(95)
            ->performOnCollections('images')
            ->nonQueued();

        // Square thumbnail (300x300) - Force JPEG format
        $this
            ->addMediaConversion('square')
            ->fit(Fit::Crop, 300, 300)
            ->format('jpg')
            ->quality(85)
            ->performOnCollections('images')
            ->nonQueued();

        // Avatar size (150x150) - Force JPEG format
        $this
            ->addMediaConversion('avatar')
            ->fit(Fit::Crop, 150, 150)
            ->format('jpg')
            ->quality(85)
            ->performOnCollections('images')
            ->nonQueued();

        // Hero banner (1920x600) - Force JPEG format
        $this
            ->addMediaConversion('hero')
            ->fit(Fit::Crop, 1920, 600)
            ->format('jpg')
            ->quality(90)
            ->performOnCollections('images')
            ->nonQueued();
    }

    /**
     * Get all media items for this gallery
     */
    public function mediaItems()
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * Get images only
     */
    public function getImagesAttribute()
    {
        return $this->getMedia('images');
    }

    /**
     * Get documents only
     */
    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents');
    }

    /**
     * Get videos only
     */
    public function getVideosAttribute()
    {
        return $this->getMedia('videos');
    }

    /**
     * Get audio files only
     */
    public function getAudioAttribute()
    {
        return $this->getMedia('audio');
    }

    /**
     * Get total file size of all media
     */
    public function getTotalSizeAttribute(): int
    {
        return $this->mediaItems()->sum('size');
    }

    /**
     * Get formatted total size
     */
    public function getFormattedTotalSizeAttribute(): string
    {
        $bytes = $this->total_size;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Get media count by collection
     */
    public function getMediaCountsAttribute(): array
    {
        return [
            'images' => $this->getMedia('images')->count(),
            'documents' => $this->getMedia('documents')->count(),
            'videos' => $this->getMedia('videos')->count(),
            'audio' => $this->getMedia('audio')->count(),
            'total' => $this->mediaItems()->count()
        ];
    }

    /**
     * Scope for public galleries
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    /**
     * Scope for private galleries
     */
    public function scopePrivate($query)
    {
        return $query->where('is_public', false);
    }
}
