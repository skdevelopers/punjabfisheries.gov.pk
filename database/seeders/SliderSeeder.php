<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing sliders
        Slider::truncate();

        // Create sample sliders
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

        Slider::create([
            'title' => 'Aqua Harvest',
            'subtitle' => 'SUSTAINABLE AQUACULTURE',
            'description' => 'Leading the way in sustainable aquaculture practices with cutting-edge technology and environmental stewardship.',
            'button_text' => 'Learn More',
            'button_url' => '/about',
            'image_path' => 'sliders/banner-2.webp',
            'order' => 2,
            'is_active' => true,
            'background_color' => '#1a365d',
            'text_color' => '#ffffff',
            'overlay_opacity' => 0.6,
        ]);

        Slider::create([
            'title' => 'Clear Waters',
            'subtitle' => 'QUALITY ASSURANCE',
            'description' => 'Maintaining the highest standards in water quality and fish health for superior aquaculture products.',
            'button_text' => 'Our Services',
            'button_url' => '/services',
            'image_path' => 'sliders/banner-3.webp',
            'order' => 3,
            'is_active' => true,
            'background_color' => '#2d3748',
            'text_color' => '#ffffff',
            'overlay_opacity' => 0.7,
        ]);

        $this->command->info('Sample sliders created successfully!');
    }
}
