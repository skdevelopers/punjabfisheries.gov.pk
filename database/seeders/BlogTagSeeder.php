<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogTag;

class BlogTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            [
                'name' => 'fishing',
                'description' => 'Articles related to fishing practices',
                'color' => '#3B82F6',
                'is_active' => true
            ],
            [
                'name' => 'sustainability',
                'description' => 'Sustainable practices in fisheries',
                'color' => '#10B981',
                'is_active' => true
            ],
            [
                'name' => 'aquaculture',
                'description' => 'Fish farming and aquaculture',
                'color' => '#059669',
                'is_active' => true
            ],
            [
                'name' => 'innovation',
                'description' => 'Innovative technologies and methods',
                'color' => '#7C3AED',
                'is_active' => true
            ],
            [
                'name' => 'technology',
                'description' => 'Modern technology in fisheries',
                'color' => '#6366F1',
                'is_active' => true
            ],
            [
                'name' => 'eco-friendly',
                'description' => 'Environmentally friendly practices',
                'color' => '#059669',
                'is_active' => true
            ],
            [
                'name' => 'fish-farming',
                'description' => 'Fish farming techniques',
                'color' => '#0EA5E9',
                'is_active' => true
            ],
            [
                'name' => 'waste-management',
                'description' => 'Waste management in aquaculture',
                'color' => '#DC2626',
                'is_active' => true
            ],
            [
                'name' => 'environment',
                'description' => 'Environmental impact and conservation',
                'color' => '#16A34A',
                'is_active' => true
            ],
            [
                'name' => 'fish-health',
                'description' => 'Fish health and disease management',
                'color' => '#7C3AED',
                'is_active' => true
            ],
            [
                'name' => 'natural-methods',
                'description' => 'Natural and organic methods',
                'color' => '#059669',
                'is_active' => true
            ],
            [
                'name' => 'nutrition',
                'description' => 'Fish nutrition and feeding',
                'color' => '#F59E0B',
                'is_active' => true
            ],

            [
                'name' => 'fish-feeding',
                'description' => 'Fish feeding practices',
                'color' => '#F59E0B',
                'is_active' => true
            ]
        ];

        foreach ($tags as $tag) {
            BlogTag::create($tag);
        }
    }
}
