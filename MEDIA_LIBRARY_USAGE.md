# WordPress-like Media Library Usage Guide

This Laravel application now includes a comprehensive media library system similar to WordPress, built with Spatie's Laravel Media Library.

## Features

- **WordPress-like Interface**: Familiar media management interface
- **Multiple File Types**: Support for images, documents, videos, and audio
- **Responsive Images**: Automatic generation of multiple image sizes
- **Bulk Operations**: Upload, edit, and delete multiple files
- **Gallery Management**: Organize media into collections
- **Search & Filter**: Find media files quickly
- **Statistics**: Track storage usage and file counts

## Quick Start

### 1. Access Media Library
Navigate to `/cms/media-library` in your admin panel to access the media library.

### 2. Create a Gallery
1. Click "New Gallery" button
2. Enter gallery title and description
3. Choose if it should be public or private
4. Click "Create Gallery"

### 3. Upload Media
1. Click "Add New" button
2. Select a gallery
3. Choose collection type (images, documents, videos, audio)
4. Select files to upload
5. Click "Upload Files"

## Available Image Sizes

The system automatically generates multiple image sizes:

- **Thumbnail**: 360x240px (for cards and admin)
- **Small**: 480x320px
- **Medium**: 800x600px
- **Large**: 1200x900px
- **Extra Large**: 1920x1080px
- **Square**: 300x300px (for avatars)
- **Avatar**: 150x150px
- **Hero**: 1920x600px (for banners)

## Using Media in Your Code

### Basic Usage

```php
use App\Models\Gallery;
use App\Services\MediaLibraryService;

// Get a gallery
$gallery = Gallery::find(1);

// Get all images
$images = $gallery->getMedia('images');

// Get a specific image
$image = $gallery->getFirstMedia('images');
```

### In Blade Templates

```blade
{{-- Using the responsive image component --}}
<x-responsive-image 
    :media="$image" 
    size="medium" 
    class="img-fluid rounded"
    alt="Custom alt text"
/>

{{-- Using the service --}}
{!! app(MediaLibraryService::class)->getImage($image, 'large') !!}

{{-- Get image URL --}}
<img src="{{ app(MediaLibraryService::class)->getImageUrl($image, 'medium') }}" alt="Image">
```

### Responsive Images

```blade
{{-- Picture element with WebP support --}}
<x-responsive-image 
    :media="$image" 
    size="large"
    :use-picture="true"
    :webp="true"
    class="img-fluid"
/>
```

## API Endpoints

### Media Library Routes

- `GET /cms/media-library` - List all media
- `POST /cms/media-library/upload` - Upload new files
- `GET /cms/media-library/{media}` - Get media details
- `PUT /cms/media-library/{media}` - Update media metadata
- `DELETE /cms/media-library/{media}` - Delete media
- `POST /cms/media-library/bulk-delete` - Bulk delete media
- `GET /cms/media-library/gallery/{gallery}/media` - Get gallery media
- `POST /cms/media-library/gallery` - Create new gallery

### Example API Usage

```javascript
// Upload files
const formData = new FormData();
formData.append('gallery_id', 1);
formData.append('collection', 'images');
formData.append('files[]', fileInput.files[0]);

fetch('/cms/media-library/upload', {
    method: 'POST',
    body: formData,
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
});

// Get media details
fetch('/cms/media-library/1')
    .then(response => response.json())
    .then(data => console.log(data.media));
```

## Configuration

### Media Library Config (`config/media-library.php`)

Key settings you might want to adjust:

```php
// Default disk for storing media
'disk_name' => env('MEDIA_DISK', 'public'),

// Maximum file size (10MB)
'max_file_size' => 1024 * 1024 * 10,

// Queue conversions for better performance
'queue_conversions_by_default' => true,

// Enable responsive images
'responsive_images' => [
    'use_tiny_placeholders' => true,
],
```

### File System Configuration

Make sure your `config/filesystems.php` has the public disk configured:

```php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => env('APP_URL').'/storage',
    'visibility' => 'public',
],
```

## Advanced Usage

### Custom Conversions

You can add custom image conversions in your Gallery model:

```php
public function registerMediaConversions(?Media $media = null): void
{
    $this
        ->addMediaConversion('custom-size')
        ->fit(Fit::Crop, 400, 300)
        ->format('webp')
        ->quality(90)
        ->performOnCollections('images')
        ->queued();
}
```

### Using Different Disks

Store different file types on different disks:

```php
// In your model
public function registerMediaCollections(): void
{
    $this
        ->addMediaCollection('images')
        ->useDisk('public'); // Local storage
        
    $this
        ->addMediaCollection('videos')
        ->useDisk('s3'); // Cloud storage
}
```

### Custom File Validation

Add custom validation rules in your controller:

```php
$validator = Validator::make($request->all(), [
    'files.*' => 'required|file|max:10240|mimes:jpeg,png,webp',
    'gallery_id' => 'required|exists:galleries,id',
]);
```

## Troubleshooting

### Common Issues

1. **Images not displaying**: Check if storage link is created (`php artisan storage:link`)
2. **Upload fails**: Verify file permissions and disk configuration
3. **Conversions not generating**: Check queue configuration and run queue workers
4. **Responsive images not working**: Ensure `withResponsiveImages()` is called on conversions

### Commands

```bash
# Create storage link
php artisan storage:link

# Run queue workers for image processing
php artisan queue:work

# Clear media conversions cache
php artisan media:clear

# Regenerate all conversions
php artisan media:regenerate
```

## Security Considerations

- File uploads are validated by MIME type and file size
- Alt text is sanitized to prevent XSS
- File names are sanitized automatically
- Consider implementing virus scanning for uploaded files
- Use appropriate file permissions for storage directories

## Performance Tips

- Enable queue processing for image conversions
- Use CDN for serving media files
- Implement image lazy loading
- Consider using WebP format for better compression
- Monitor storage usage regularly

## Support

For issues or questions about the media library system, check:

1. Laravel Media Library documentation: https://spatie.be/docs/laravel-medialibrary
2. Check application logs in `storage/logs/laravel.log`
3. Verify file permissions and disk configuration
4. Ensure all required packages are installed
