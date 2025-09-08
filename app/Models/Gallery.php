<?php

namespace App\Models;

use App\Traits\HasOrgScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Gallery - a central bucket for images.
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $org_unit_id
 */
class Gallery extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasOrgScope;

    /** @var array<int, string> */
    protected $fillable = ['title','slug','description','org_unit_id','is_public'];

    /**
     * Media collections. We keep one named 'images'.
     * withResponsiveImages() here generates srcset for the ORIGINAL file.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->useDisk(config('filesystems.default', 'public'))
            ->acceptsMimeTypes(['image/jpeg','image/png','image/webp'])
            ->withResponsiveImages() // responsive sizes for the original
            ->useFallbackUrl(url('/images/app-logo.svg'))
            ->useFallbackPath(public_path('/images/app-logo.svg'));
    }

    /**
     * Conversions:
     * - thumb: exact crop for cards/admin (optional responsive for DPRs)
     * - web: single “max” pipeline in WEBP, but with responsive widths
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Card/admin thumbnail (exact crop ≈ CSS object-fit: cover)
        $this
            ->addMediaConversion('thumb')
            ->fit(Fit::Crop, 360, 240)
            ->format('webp')
            ->withResponsiveImages()              // create 1x/1.5x/2x etc for the thumb too
            ->performOnCollections('images')
            ->queued();

        // Front-end delivery (no fixed S/M/L; let srcset pick widths)
        $this
            ->addMediaConversion('web')
            ->fit(Fit::Max, 2560, 2560)          // cap the long edge; keeps aspect
            ->format('webp')
            ->withResponsiveImages()              // generates multiple widths for 'web'
            ->performOnCollections('images')
            ->queued();
    }
}
