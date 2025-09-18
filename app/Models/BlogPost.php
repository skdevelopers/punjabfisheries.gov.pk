<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

class BlogPost extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'banner_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'category_id',
        'author_id',
        'status',
        'is_featured',
        'allow_comments',
        'view_count',
        'published_at'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'allow_comments' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(BlogComment::class)->where('status', 'approved');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%");
        });
    }

    // Mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setPublishedAtAttribute($value)
    {
        if ($value) {
            $this->attributes['published_at'] = Carbon::parse($value);
        }
    }

    // Accessors
    public function getIsPublishedAttribute()
    {
        return $this->status === 'published' && $this->published_at <= Carbon::now();
    }

    public function getReadingTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200); // Average reading speed
        return $minutes;
    }

    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }
        
        // Auto-generate excerpt from content if not provided
        return Str::limit(strip_tags($this->content), 160);
    }

    public function getMetaTitleAttribute($value)
    {
        return $value ?: $this->title;
    }

    public function getMetaDescriptionAttribute($value)
    {
        return $value ?: $this->excerpt;
    }

    // Methods
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    public function publish()
    {
        $this->update([
            'status' => 'published',
            'published_at' => $this->published_at ?: Carbon::now()
        ]);
    }

    public function unpublish()
    {
        $this->update([
            'status' => 'draft',
            'published_at' => null
        ]);
    }

    /**
     * Media collections for blog post images
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('featured_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/png','image/webp'])
            ->withResponsiveImages()
            ->singleFile()
            ->useFallbackUrl(url('/images/800x600.png'))
            ->useFallbackPath(public_path('/images/800x600.png'));

        $this
            ->addMediaCollection('banner_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg','image/png','image/webp'])
            ->withResponsiveImages()
            ->singleFile()
            ->useFallbackUrl(url('/images/800x600.png'))
            ->useFallbackPath(public_path('/images/800x600.png'));
    }

    /**
     * Media conversions for blog post images
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        // Generic thumb conversion for both collections
        $this
            ->addMediaConversion('thumb')
            ->width(300)
            ->height(200)
            ->keepOriginalImageFormat()
            ->performOnCollections('featured_image', 'banner_image')
            ->nonQueued();

        // Featured image conversions
        $this
            ->addMediaConversion('featured_thumb')
            ->fit(Fit::Crop, 400, 300)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('featured_image')
            ->nonQueued();

        $this
            ->addMediaConversion('featured_web')
            ->fit(Fit::Max, 1200, 800)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('featured_image')
            ->nonQueued();

        // Banner image conversions
        $this
            ->addMediaConversion('banner_thumb')
            ->fit(Fit::Crop, 600, 200)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('banner_image')
            ->nonQueued();

        $this
            ->addMediaConversion('banner_web')
            ->fit(Fit::Max, 1920, 600)
            ->format('webp')
            ->withResponsiveImages()
            ->performOnCollections('banner_image')
            ->nonQueued();
    }

    /**
     * Get featured image URL
     */
    public function getFeaturedImageUrlAttribute()
    {
        $media = $this->getFirstMedia('featured_image');
        return $media ? $media->getUrl() : url('/images/800x600.png');
    }

    /**
     * Get banner image URL
     */
    public function getBannerImageUrlAttribute()
    {
        $media = $this->getFirstMedia('banner_image');
        return $media ? $media->getUrl() : url('/images/800x600.png');
    }
}
