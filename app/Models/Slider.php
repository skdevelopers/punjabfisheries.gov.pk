<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_url',
        'image_path',
        'order',
        'is_active',
        'background_color',
        'text_color',
        'overlay_opacity',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'overlay_opacity' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image_path) {
            return Storage::url($this->image_path);
        }
        return asset('images/800x600.png');
    }

    /**
     * Media collections for slider images
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('slider_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/png','image/webp'])
            ->withResponsiveImages()
            ->singleFile()
            ->useFallbackUrl(url('/images/800x600.png'))
            ->useFallbackPath(public_path('/images/800x600.png'));
    }

    /**
     * Media conversions for slider images
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Slider image conversions
        $this
            ->addMediaConversion('slider_thumb')
            ->fit(Fit::Crop, 400, 300)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('slider_image')
            ->nonQueued();

        $this
            ->addMediaConversion('slider_web')
            ->fit(Fit::Max, 1920, 800)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('slider_image')
            ->nonQueued();

        $this
            ->addMediaConversion('slider_mobile')
            ->fit(Fit::Max, 768, 400)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('slider_image')
            ->nonQueued();
    }

    /**
     * Get slider image URL using media library
     */
    public function getSliderImageUrlAttribute()
    {
        $media = $this->getFirstMedia('slider_image');
        return $media ? $media->getUrl() : $this->getImageUrlAttribute();
    }
}
