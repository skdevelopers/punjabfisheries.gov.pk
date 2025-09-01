# Slider Management System Guide

## Overview
The slider management system allows you to create, edit, and manage dynamic sliders for the frontend website through the CMS admin panel.

## Features
- ✅ Create and edit sliders with images, text, and buttons
- ✅ Reorder sliders using drag-and-drop
- ✅ Enable/disable sliders
- ✅ Customize colors and overlay opacity
- ✅ Responsive design
- ✅ Automatic fallback to default content

## How to Access Slider Management

1. **Login to CMS Admin Panel**
   - Go to `/admin` or `/dashboard`
   - Login with admin credentials

2. **Navigate to Slider Management**
   - Click on "Manage Sliders" from the CMS dashboard
   - Or go directly to `/cms/sliders`

## Creating a New Slider

1. **Click "Add New Slider"** button
2. **Fill in the form fields:**
   - **Title**: Main heading text (e.g., "Fresh Fisheries")
   - **Subtitle**: Secondary text (e.g., "FISHING MAKES ME CRAZY")
   - **Description**: Detailed description text
   - **Button Text**: Text for the call-to-action button
   - **Button URL**: Link for the button (can be internal or external)
   - **Image**: Upload slider background image (recommended: 1920x1080px)
   - **Order**: Position in the slider sequence
   - **Active**: Toggle to enable/disable the slider
   - **Background Color**: Hex color for background (optional)
   - **Text Color**: Hex color for text (optional)
   - **Overlay Opacity**: Transparency level (0.0 to 1.0)

3. **Click "Create Slider"** to save

## Editing Sliders

1. **Find the slider** in the slider list
2. **Click the edit icon** (pencil icon)
3. **Modify the fields** as needed
4. **Click "Update Slider"** to save changes

## Managing Slider Order

1. **Drag and drop** sliders in the list to reorder them
2. **The order number** will update automatically
3. **Sliders display** in ascending order (1, 2, 3, etc.)

## Enabling/Disabling Sliders

1. **Toggle the "Active" status** in the slider list
2. **Only active sliders** appear on the frontend
3. **Inactive sliders** are hidden but not deleted

## Frontend Integration

### Homepage Slider
- **Location**: `/` (homepage)
- **Component**: `<x-slider :sliders="$sliders" />`
- **Data Source**: Active sliders from database

### About Page Slider
- **Location**: `/about`
- **Component**: `<x-slider :sliders="$sliders" />`
- **Data Source**: Active sliders from database

### Fallback Content
If no sliders are configured or all are inactive:
- Default slider content is displayed
- Uses hardcoded images and text
- Maintains consistent user experience

## Technical Details

### Database Structure
```sql
sliders table:
- id (primary key)
- title (string, nullable)
- subtitle (string, nullable)
- description (text, nullable)
- button_text (string, nullable)
- button_url (string, nullable)
- image_path (string, nullable)
- order (integer, default: 0)
- is_active (boolean, default: true)
- background_color (string, nullable)
- text_color (string, nullable)
- overlay_opacity (decimal, default: 0.5)
- created_at, updated_at (timestamps)
```

### File Storage
- **Images stored in**: `storage/app/public/sliders/`
- **Public URL**: `/storage/sliders/filename.ext`
- **Supported formats**: JPEG, PNG, JPG, GIF, WebP
- **Max file size**: 5MB

### Component Usage
```blade
<!-- Basic usage -->
<x-slider :sliders="$sliders" />

<!-- With custom data -->
<x-slider :sliders="App\Models\Slider::active()->ordered()->get()" />
```

## Best Practices

### Image Guidelines
- **Recommended size**: 1920x1080 pixels
- **Aspect ratio**: 16:9 or similar
- **File format**: WebP for best performance
- **File size**: Under 500KB for fast loading

### Content Guidelines
- **Title**: Keep under 50 characters
- **Subtitle**: Keep under 100 characters
- **Description**: Keep under 200 characters
- **Button text**: Keep under 20 characters

### Color Guidelines
- **Background color**: Use dark colors for light text
- **Text color**: Use light colors for dark backgrounds
- **Contrast**: Ensure good readability
- **Brand consistency**: Use brand colors when possible

## Troubleshooting

### Common Issues

1. **Slider not appearing**
   - Check if slider is marked as "Active"
   - Verify image is uploaded correctly
   - Check browser console for errors

2. **Image not loading**
   - Verify file exists in storage
   - Check file permissions
   - Run `php artisan storage:link` if needed

3. **Order not updating**
   - Refresh the page
   - Check for JavaScript errors
   - Verify AJAX request is successful

### Maintenance Commands
```bash
# Create storage link (if images not loading)
php artisan storage:link

# Clear cache
php artisan cache:clear

# Regenerate autoload files
composer dump-autoload
```

## Sample Slider Data

Here's an example of a well-configured slider:

```php
Slider::create([
    'title' => 'Fresh Fisheries',
    'subtitle' => 'FISHING MAKES ME CRAZY',
    'description' => 'Fresh Fisheries delivers premium, sustainable seafood through innovative aqua farming and expert fishery services.',
    'button_text' => 'Get A Quote',
    'button_url' => '#',
    'image_path' => 'sliders/banner-1.webp',
    'order' => 1,
    'is_active' => true,
    'background_color' => '#000000',
    'text_color' => '#ffffff',
    'overlay_opacity' => 0.5,
]);
```

## Support

For technical support or questions about the slider management system:
- Check this documentation first
- Review the Laravel logs for errors
- Contact the development team

---

**Last Updated**: January 2025
**Version**: 1.0
