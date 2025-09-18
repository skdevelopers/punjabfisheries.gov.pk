<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'New Shrimp Farming Training Program 2025',
                'description' => 'Join our comprehensive shrimp farming training program designed for both beginners and experienced farmers. Learn modern aquaculture techniques, water management, and sustainable farming practices.',
                'content' => '<p>The Department of Fisheries - Punjab is pleased to announce the launch of our new <strong>Shrimp Farming Training Program 2025</strong>. This comprehensive program is designed to equip farmers with the latest knowledge and techniques in sustainable shrimp aquaculture.</p>

<h3>Program Highlights:</h3>
<ul>
<li>Modern aquaculture techniques and best practices</li>
<li>Water quality management and monitoring</li>
<li>Disease prevention and treatment</li>
<li>Feed management and nutrition</li>
<li>Marketing and business development</li>
<li>Hands-on practical training sessions</li>
</ul>

<h3>Eligibility:</h3>
<p>Open to all farmers, students, and aquaculture enthusiasts. No prior experience required.</p>

<h3>Duration:</h3>
<p>4 weeks intensive training program</p>

<h3>Registration:</h3>
<p>Interested participants can register online or visit our office. Limited seats available.</p>',
                'type' => 'general',
                'status' => 'active',
                'priority' => 'high',
                'published_date' => Carbon::now()->subDays(2),
                'expiry_date' => Carbon::now()->addDays(30),
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Tender Notice: Supply of Fish Feed and Equipment',
                'description' => 'Invitation for sealed tenders for the supply of high-quality fish feed and aquaculture equipment for government fish farms across Punjab.',
                'content' => '<p>The Department of Fisheries - Punjab invites sealed tenders from registered suppliers for the supply of fish feed and aquaculture equipment.</p>

<h3>Tender Details:</h3>
<ul>
<li><strong>Tender No:</strong> DOF/2025/001</li>
<li><strong>Estimated Value:</strong> Rs. 50,000,000</li>
<li><strong>Last Date for Submission:</strong> 15th February 2025</li>
<li><strong>Opening Date:</strong> 16th February 2025 at 2:00 PM</li>
</ul>

<h3>Required Items:</h3>
<ul>
<li>High-protein fish feed (various sizes)</li>
<li>Water quality testing equipment</li>
<li>Aeration systems</li>
<li>Fishing nets and equipment</li>
<li>Safety equipment</li>
</ul>

<h3>Eligibility Criteria:</h3>
<p>Suppliers must be registered with the Punjab Procurement Regulatory Authority (PPRA) and have relevant experience in aquaculture supplies.</p>',
                'type' => 'tender',
                'status' => 'active',
                'priority' => 'high',
                'published_date' => Carbon::now()->subDays(5),
                'expiry_date' => Carbon::now()->addDays(25),
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Important Notice: Water Quality Testing Schedule',
                'description' => 'Schedule for free water quality testing services for fish farmers. Book your appointment now to ensure optimal water conditions for your fish farms.',
                'content' => '<p>The Department of Fisheries - Punjab is pleased to announce the schedule for free water quality testing services for fish farmers across the province.</p>

<h3>Testing Schedule:</h3>
<ul>
<li><strong>Lahore Division:</strong> 1st - 15th March 2025</li>
<li><strong>Faisalabad Division:</strong> 16th - 30th March 2025</li>
<li><strong>Multan Division:</strong> 1st - 15th April 2025</li>
<li><strong>Rawalpindi Division:</strong> 16th - 30th April 2025</li>
</ul>

<h3>Services Include:</h3>
<ul>
<li>pH level testing</li>
<li>Dissolved oxygen measurement</li>
<li>Ammonia and nitrite analysis</li>
<li>Temperature monitoring</li>
<li>Recommendations for water treatment</li>
</ul>

<h3>How to Book:</h3>
<p>Contact your local fisheries office or call our helpline at 042-99211584 to book your appointment.</p>',
                'type' => 'notice',
                'status' => 'active',
                'priority' => 'normal',
                'published_date' => Carbon::now()->subDays(1),
                'expiry_date' => Carbon::now()->addDays(60),
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Corrigendum: Fish Seed Distribution Program',
                'description' => 'Correction to the previously announced fish seed distribution program. Updated dates and eligibility criteria for the 2025 fish seed distribution initiative.',
                'content' => '<p>This is a corrigendum to the Fish Seed Distribution Program announced on 10th January 2025.</p>

<h3>Corrections:</h3>
<ul>
<li><strong>Original Date:</strong> 15th February 2025</li>
<li><strong>Corrected Date:</strong> 20th February 2025</li>
<li><strong>Original Time:</strong> 9:00 AM</li>
<li><strong>Corrected Time:</strong> 10:00 AM</li>
</ul>

<h3>Updated Eligibility:</h3>
<ul>
<li>Farmers with minimum 1 acre pond area (previously 2 acres)</li>
<li>Valid CNIC and land ownership documents required</li>
<li>Registration deadline extended to 18th February 2025</li>
</ul>

<h3>Available Fish Seeds:</h3>
<ul>
<li>Rohu (Labeo rohita)</li>
<li>Catla (Catla catla)</li>
<li>Mrigal (Cirrhinus mrigala)</li>
<li>Grass Carp (Ctenopharyngodon idella)</li>
</ul>

<p>We apologize for any inconvenience caused by this change.</p>',
                'type' => 'corrigendum',
                'status' => 'active',
                'priority' => 'high',
                'published_date' => Carbon::now()->subHours(12),
                'expiry_date' => Carbon::now()->addDays(15),
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Aquaculture Research Conference 2025',
                'description' => 'Join us for the 3rd Annual Aquaculture Research Conference featuring latest research findings, innovative technologies, and networking opportunities for aquaculture professionals.',
                'content' => '<p>The Department of Fisheries - Punjab is organizing the <strong>3rd Annual Aquaculture Research Conference 2025</strong> to showcase the latest developments in aquaculture research and technology.</p>

<h3>Conference Details:</h3>
<ul>
<li><strong>Date:</strong> 25th - 27th March 2025</li>
<li><strong>Venue:</strong> Lahore Expo Center</li>
<li><strong>Theme:</strong> "Sustainable Aquaculture for Food Security"</li>
</ul>

<h3>Key Topics:</h3>
<ul>
<li>Advances in fish breeding and genetics</li>
<li>Sustainable feed development</li>
<li>Water quality management</li>
<li>Disease prevention and treatment</li>
<li>Aquaponics and integrated farming</li>
<li>Climate change adaptation</li>
</ul>

<h3>Registration:</h3>
<p>Early bird registration is now open. Students and researchers get 50% discount on registration fees.</p>

<h3>Call for Papers:</h3>
<p>Submit your research abstracts by 15th February 2025. Selected papers will be published in our conference proceedings.</p>',
                'type' => 'general',
                'status' => 'active',
                'priority' => 'normal',
                'published_date' => Carbon::now()->subDays(3),
                'expiry_date' => Carbon::now()->addDays(45),
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Fish Health Monitoring Program',
                'description' => 'Launch of comprehensive fish health monitoring program to prevent disease outbreaks and ensure healthy fish production across Punjab.',
                'content' => '<p>The Department of Fisheries - Punjab is launching a comprehensive <strong>Fish Health Monitoring Program</strong> to ensure healthy fish production and prevent disease outbreaks.</p>

<h3>Program Objectives:</h3>
<ul>
<li>Regular health monitoring of fish farms</li>
<li>Early detection of diseases</li>
<li>Preventive measures and treatment protocols</li>
<li>Farmer education and training</li>
</ul>

<h3>Services Provided:</h3>
<ul>
<li>Free fish health checkups</li>
<li>Disease diagnosis and treatment</li>
<li>Water quality analysis</li>
<li>Feed quality assessment</li>
<li>Farm management advice</li>
</ul>

<h3>Coverage Areas:</h3>
<p>The program will cover all major fish farming areas in Punjab, starting with Lahore, Faisalabad, and Multan divisions.</p>

<h3>How to Participate:</h3>
<p>Fish farmers can register for the program by contacting their local fisheries office or calling our helpline.</p>',
                'type' => 'notice',
                'status' => 'active',
                'priority' => 'normal',
                'published_date' => Carbon::now()->subDays(7),
                'expiry_date' => Carbon::now()->addDays(90),
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}