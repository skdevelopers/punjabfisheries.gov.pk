<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Fisheries Management',
                'description' => 'Articles about fisheries management practices and policies',
                'color' => '#3B82F6',
                'icon' => 'fish',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Aquaculture Technology',
                'description' => 'Latest innovations and technologies in aquaculture',
                'color' => '#10B981',
                'icon' => 'microscope',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'Sustainable Farming',
                'description' => 'Eco-friendly and sustainable fish farming practices',
                'color' => '#059669',
                'icon' => 'leaf',
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'Waste Management',
                'description' => 'Waste reduction and management in aquaculture',
                'color' => '#DC2626',
                'icon' => 'recycle',
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'Fish Health',
                'description' => 'Fish health management and disease prevention',
                'color' => '#7C3AED',
                'icon' => 'heart',
                'is_active' => true,
                'order' => 5
            ],
            [
                'name' => 'Fish Nutrition',
                'description' => 'Nutrition and feeding practices for fish',
                'color' => '#F59E0B',
                'icon' => 'nutrition',
                'is_active' => true,
                'order' => 6
            ]
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
