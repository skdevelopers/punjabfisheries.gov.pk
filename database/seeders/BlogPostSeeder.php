<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\User;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create a user for author
        $user = User::first() ?? User::factory()->create();

        // Get categories
        $fisheriesCategory = BlogCategory::where('name', 'Fisheries Management')->first();
        $aquacultureCategory = BlogCategory::where('name', 'Aquaculture Technology')->first();
        $sustainableCategory = BlogCategory::where('name', 'Sustainable Farming')->first();
        $wasteCategory = BlogCategory::where('name', 'Waste Management')->first();
        $healthCategory = BlogCategory::where('name', 'Fish Health')->first();
        $nutritionCategory = BlogCategory::where('name', 'Fish Nutrition')->first();

        // Get tags
        $fishingTag = BlogTag::where('name', 'fishing')->first();
        $sustainabilityTag = BlogTag::where('name', 'sustainability')->first();
        $aquacultureTag = BlogTag::where('name', 'aquaculture')->first();
        $innovationTag = BlogTag::where('name', 'innovation')->first();
        $technologyTag = BlogTag::where('name', 'technology')->first();
        $ecoFriendlyTag = BlogTag::where('name', 'eco-friendly')->first();
        $wasteManagementTag = BlogTag::where('name', 'waste-management')->first();
        $environmentTag = BlogTag::where('name', 'environment')->first();
        $fishHealthTag = BlogTag::where('name', 'fish-health')->first();
        $naturalMethodsTag = BlogTag::where('name', 'natural-methods')->first();
        $nutritionTag = BlogTag::where('name', 'nutrition')->first();

        $posts = [
            [
                'title' => 'Sustainable Fishing Practices Explained',
                'excerpt' => 'Learn eco-friendly fishing methods that conserve marine life and promote sustainable fisheries management in Punjab.',
                'content' => '<p>Learn eco-friendly fishing methods that conserve marine life and promote sustainable fisheries management in Punjab. This comprehensive guide covers the latest techniques and best practices for responsible fishing.</p><p>Sustainable fishing is crucial for maintaining healthy fish populations and protecting our aquatic ecosystems. By implementing these practices, we can ensure that future generations will continue to benefit from our rich marine resources.</p><p>The Department of Fisheries, Government of the Punjab, is committed to promoting sustainable fishing practices that balance economic development with environmental conservation. Our initiatives include training programs for fishermen, research on sustainable fishing methods, and the implementation of regulations that protect marine biodiversity.</p>',
                'category_id' => $fisheriesCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => true,
                'allow_comments' => true,
                'published_at' => now()->subDays(15),
                'featured_image' => 'assets/images/blog-1.webp',
                'banner_image' => 'assets/images/blog-1.webp',
                'meta_title' => 'Sustainable Fishing Practices - Punjab Fisheries',
                'meta_description' => 'Discover sustainable fishing practices and eco-friendly methods for fisheries management in Punjab. Learn about responsible fishing techniques.',
                'meta_keywords' => 'sustainable fishing, fisheries management, Punjab, eco-friendly',
                'tags' => [$fishingTag->id, $sustainabilityTag->id, $aquacultureTag->id]
            ],
            [
                'title' => 'Top Aquaculture Innovations Today',
                'excerpt' => 'Sustainable fish farming enhanced by innovative technologies and modern aquaculture practices in Punjab.',
                'content' => '<p>Sustainable fish farming enhanced by innovative technologies and modern aquaculture practices in Punjab. Discover the latest breakthroughs in aquaculture technology.</p><p>From automated feeding systems to advanced water quality monitoring, these innovations are revolutionizing the way we farm fish while maintaining environmental sustainability. Modern aquaculture facilities in Punjab are now equipped with state-of-the-art technology that ensures optimal fish growth and health.</p><p>The integration of IoT devices, automated feeding systems, and real-time water quality monitoring has significantly improved the efficiency and sustainability of fish farming operations. These technologies help reduce waste, optimize feed usage, and maintain optimal environmental conditions for fish growth.</p>',
                'category_id' => $aquacultureCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => true,
                'allow_comments' => true,
                'published_at' => now()->subDays(10),
                'featured_image' => 'assets/images/blog-2.webp',
                'banner_image' => 'assets/images/blog-2.webp',
                'meta_title' => 'Aquaculture Innovations - Punjab Fisheries',
                'meta_description' => 'Explore the latest aquaculture innovations and technologies transforming fish farming in Punjab. Modern sustainable practices.',
                'meta_keywords' => 'aquaculture, innovation, technology, fish farming',
                'tags' => [$aquacultureTag->id, $innovationTag->id, $technologyTag->id]
            ],
            [
                'title' => 'Eco-Friendly Fish Farming Benefits',
                'excerpt' => 'Sustainable aquaculture improves fish quality and biodiversity while protecting our water resources.',
                'content' => '<p>Sustainable aquaculture improves fish quality and biodiversity while protecting our water resources. Learn about the environmental and economic benefits of eco-friendly fish farming.</p><p>By adopting sustainable practices, fish farmers can reduce their environmental footprint while improving productivity and fish health. Eco-friendly fish farming methods include the use of natural feed, proper waste management, and the maintenance of healthy aquatic ecosystems.</p><p>The benefits of eco-friendly fish farming extend beyond environmental protection. These practices also result in higher quality fish products, improved market value, and long-term economic sustainability for fish farmers. Additionally, sustainable aquaculture helps preserve local biodiversity and maintains the ecological balance of water bodies.</p>',
                'category_id' => $sustainableCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => false,
                'allow_comments' => true,
                'published_at' => now()->subDays(5),
                'featured_image' => 'assets/images/blog-3.webp',
                'banner_image' => 'assets/images/blog-3.webp',
                'meta_title' => 'Eco-Friendly Fish Farming - Punjab Fisheries',
                'meta_description' => 'Discover the benefits of eco-friendly fish farming and sustainable aquaculture practices. Environmental and economic advantages.',
                'meta_keywords' => 'eco-friendly, fish farming, sustainability, aquaculture',
                'tags' => [$ecoFriendlyTag->id, $aquacultureTag->id, $sustainabilityTag->id]
            ],
            [
                'title' => 'Reducing Waste in Aquaculture',
                'excerpt' => 'Learn eco-friendly fishing methods that conserve marine life and reduce environmental impact.',
                'content' => '<p>Learn eco-friendly fishing methods that conserve marine life and reduce environmental impact. Discover innovative waste management techniques in aquaculture.</p><p>Effective waste management is essential for sustainable aquaculture operations and maintaining water quality in fish farming systems. Modern waste management techniques include the use of biofilters, proper feed management, and the implementation of circular aquaculture systems.</p><p>By reducing waste in aquaculture operations, we can minimize environmental pollution, improve water quality, and create more sustainable fish farming practices. These efforts contribute to the overall health of aquatic ecosystems and support the long-term viability of the aquaculture industry.</p>',
                'category_id' => $wasteCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => false,
                'allow_comments' => true,
                'published_at' => now()->subDays(1),
                'featured_image' => 'assets/images/blog-4.webp',
                'banner_image' => 'assets/images/blog-4.webp',
                'meta_title' => 'Waste Management in Aquaculture - Punjab Fisheries',
                'meta_description' => 'Learn about waste reduction techniques in aquaculture and eco-friendly fishing methods. Environmental conservation.',
                'meta_keywords' => 'waste management, aquaculture, environment, sustainability',
                'tags' => [$wasteManagementTag->id, $aquacultureTag->id, $environmentTag->id]
            ],
            [
                'title' => 'Enhancing Fish Health Naturally',
                'excerpt' => 'Learn eco-friendly fishing methods that conserve marine life and promote natural fish health.',
                'content' => '<p>Learn eco-friendly fishing methods that conserve marine life and promote natural fish health. Discover natural approaches to fish health management.</p><p>Natural health enhancement methods can improve fish immunity and reduce the need for chemical treatments in aquaculture. These methods include the use of probiotics, natural feed supplements, and stress reduction techniques.</p><p>By focusing on natural fish health enhancement, we can create more sustainable aquaculture practices that prioritize the well-being of fish while maintaining high production standards. These approaches also contribute to the production of healthier fish products for consumers.</p>',
                'category_id' => $healthCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => false,
                'allow_comments' => true,
                'published_at' => now()->subDays(3),
                'featured_image' => 'assets/images/blog-5.webp',
                'banner_image' => 'assets/images/blog-5.webp',
                'meta_title' => 'Natural Fish Health Enhancement - Punjab Fisheries',
                'meta_description' => 'Explore natural methods for enhancing fish health in aquaculture. Eco-friendly approaches to fish health management.',
                'meta_keywords' => 'fish health, natural methods, aquaculture, sustainability',
                'tags' => [$fishHealthTag->id, $naturalMethodsTag->id, $aquacultureTag->id]
            ],
            [
                'title' => 'The Role of Nutrition in Aquaculture',
                'excerpt' => 'Learn eco-friendly fishing methods that conserve marine life and optimize fish nutrition.',
                'content' => '<p>Learn eco-friendly fishing methods that conserve marine life and optimize fish nutrition. Understand the importance of proper nutrition in aquaculture.</p><p>Optimal nutrition is crucial for fish growth, health, and reproduction. Learn about sustainable feeding practices and nutritional requirements. Proper nutrition not only ensures healthy fish growth but also contributes to the overall sustainability of aquaculture operations.</p><p>The development of sustainable feed formulations and feeding strategies is essential for the future of aquaculture. By optimizing nutrition, we can improve feed efficiency, reduce environmental impact, and produce high-quality fish products.</p>',
                'category_id' => $nutritionCategory->id,
                'author_id' => $user->id,
                'status' => 'published',
                'is_featured' => false,
                'allow_comments' => true,
                'published_at' => now()->subDays(2),
                'featured_image' => 'assets/images/blog-6.webp',
                'banner_image' => 'assets/images/blog-6.webp',
                'meta_title' => 'Fish Nutrition in Aquaculture - Punjab Fisheries',
                'meta_description' => 'Understand the role of nutrition in aquaculture and sustainable feeding practices. Fish health and growth optimization.',
                'meta_keywords' => 'nutrition, aquaculture, fish feeding, sustainability',
                'tags' => [$nutritionTag->id, $aquacultureTag->id, $sustainabilityTag->id]
            ]
        ];

        foreach ($posts as $postData) {
            $tags = $postData['tags'];
            unset($postData['tags']);
            
            $post = BlogPost::create($postData);
            $post->tags()->attach($tags);
        }
    }
}
