<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class RestoreTestMedia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:restore-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore test media from storage files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting media restoration...');

        // Get the first gallery
        $gallery = Gallery::first();
        if (!$gallery) {
            $this->error('No galleries found. Please create a gallery first.');
            return 1;
        }

        $this->info("Using gallery: {$gallery->title}");

        // Scan storage directory for orphaned files
        $storagePath = storage_path('app/public');
        $directories = glob($storagePath . '/*', GLOB_ONLYDIR);

        $restoredCount = 0;

        foreach ($directories as $dir) {
            $dirName = basename($dir);
            
            // Skip non-numeric directories
            if (!is_numeric($dirName)) {
                continue;
            }
            
            $this->info("Processing directory: $dirName");
            
            // Find original files (not conversions)
            $files = glob($dir . '/*');
            $originalFiles = array_filter($files, function($file) {
                return is_file($file) && 
                       !str_contains($file, 'conversions') && 
                       !str_contains($file, 'responsive-images');
            });
            
            foreach ($originalFiles as $file) {
                $fileName = basename($file);
                $filePath = $dirName . '/' . $fileName;
                
                try {
                    // Add media to gallery without responsive images to avoid queue issues
                    $media = $gallery->addMediaFromDisk($filePath, 'public')
                        ->toMediaCollection('images');
                    
                    $this->info("  ✓ Restored: $fileName (ID: {$media->id})");
                    $restoredCount++;
                    
                } catch (\Exception $e) {
                    $this->error("  ✗ Error restoring $fileName: " . $e->getMessage());
                }
            }
        }

        $this->info("Media restoration complete! Restored $restoredCount media items.");
        
        if ($restoredCount > 0) {
            $this->info('Regenerating conversions...');
            $this->call('media-library:regenerate');
        }

        return 0;
    }
}