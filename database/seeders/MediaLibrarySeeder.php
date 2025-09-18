<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;
use Illuminate\Support\Str;

class MediaLibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample galleries
        $galleries = [
            [
                'title' => 'Website Images',
                'slug' => 'website-images',
                'description' => 'Main gallery for website images and graphics',
                'is_public' => true,
            ],
            [
                'title' => 'Document Library',
                'slug' => 'document-library',
                'description' => 'Collection of documents, PDFs, and files',
                'is_public' => true,
            ],
            [
                'title' => 'Video Gallery',
                'slug' => 'video-gallery',
                'description' => 'Video content and media files',
                'is_public' => true,
            ],
            [
                'title' => 'Private Files',
                'slug' => 'private-files',
                'description' => 'Internal documents and private media',
                'is_public' => false,
            ],
            [
                'title' => 'Blog Images',
                'slug' => 'blog-images',
                'description' => 'Images specifically for blog posts and articles',
                'is_public' => true,
            ],
        ];

        foreach ($galleries as $galleryData) {
            Gallery::create($galleryData);
        }

        $this->command->info('Media Library galleries created successfully!');
    }
}
