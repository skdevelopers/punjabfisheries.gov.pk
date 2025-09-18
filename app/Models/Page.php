<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_description',
        'status',
        'featured_image'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Media collections for page images
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('featured_image')
            ->useDisk('public')
            ->withResponsiveImages()
            ->singleFile();

        $this
            ->addMediaCollection('banner')
            ->useDisk('public')
            ->withResponsiveImages()
            ->singleFile();
    }

    /**
     * Media conversions for page images
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->keepOriginalImageFormat()
            ->performOnCollections('featured_image', 'banner')
            ->nonQueued();
    }

    /**
     * Get featured image URL
     */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('featured_image');
        return $media ? $media->getUrl() : null;
    }

    /**
     * Get featured image thumb URL
     */
    public function getFeaturedImageThumbUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('featured_image');
        return $media ? $media->getUrl('thumb') : null;
    }

    /**
     * Get banner URL
     */
    public function getBannerUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner');
        return $media ? $media->getUrl() : null;
    }

    /**
     * Get banner thumb URL
     */
    public function getBannerThumbUrlAttribute(): ?string
    {
        $media = $this->getFirstMedia('banner');
        return $media ? $media->getUrl('thumb') : null;
    }
}
