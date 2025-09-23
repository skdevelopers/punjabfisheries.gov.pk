<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Senior Fisheries Officer',
                'description' => 'We are seeking a highly qualified Senior Fisheries Officer to oversee fish breeding programs and manage hatchery operations. The ideal candidate will have extensive experience in aquaculture and fisheries management.',
                'department' => 'Aquaculture Division',
                'location' => 'Lahore, Punjab',
                'employment_type' => 'Full-time',
                'experience_level' => 'Senior',
                'salary_min' => 80000,
                'salary_max' => 120000,
                'requirements' => '• Master\'s degree in Fisheries Science or related field
• Minimum 5 years experience in aquaculture
• Strong leadership and management skills
• Knowledge of modern fish breeding techniques
• Excellent communication skills',
                'benefits' => '• Competitive salary package
• Health insurance coverage
• Professional development opportunities
• Annual leave and sick leave
• Government pension benefits',
                'application_deadline' => now()->addDays(30),
                'is_active' => true,
                'status' => 'open'
            ],
            [
                'title' => 'Hatchery Technician',
                'description' => 'Join our team as a Hatchery Technician to assist in fish breeding operations and maintain hatchery equipment. This is an excellent opportunity for someone looking to start a career in aquaculture.',
                'department' => 'Hatchery Operations',
                'location' => 'Faisalabad, Punjab',
                'employment_type' => 'Full-time',
                'experience_level' => 'Entry',
                'salary_min' => 35000,
                'salary_max' => 50000,
                'requirements' => '• Bachelor\'s degree in Fisheries Science or Biology
• Basic knowledge of fish breeding
• Ability to work in outdoor conditions
• Physical fitness for manual work
• Willingness to learn new techniques',
                'benefits' => '• Training provided
• Health insurance
• Overtime pay
• Career advancement opportunities
• Uniform and safety equipment provided',
                'application_deadline' => now()->addDays(21),
                'is_active' => true,
                'status' => 'open'
            ],
            [
                'title' => 'Research Assistant - Fish Genetics',
                'description' => 'We are looking for a Research Assistant to support our fish genetics research program. The candidate will work closely with senior researchers on breeding programs and genetic analysis.',
                'department' => 'Research & Development',
                'location' => 'Multan, Punjab',
                'employment_type' => 'Contract',
                'experience_level' => 'Mid',
                'salary_min' => 45000,
                'salary_max' => 65000,
                'requirements' => '• Master\'s degree in Genetics or Fisheries Science
• 2-3 years research experience
• Knowledge of molecular biology techniques
• Experience with laboratory equipment
• Strong analytical skills',
                'benefits' => '• Research opportunities
• Conference attendance support
• Flexible working hours
• Professional development fund
• Publication incentives',
                'application_deadline' => now()->addDays(14),
                'is_active' => true,
                'status' => 'open'
            ],
            [
                'title' => 'Field Officer - Fish Stocking',
                'description' => 'Join our field operations team to manage fish stocking programs in various water bodies across Punjab. This role involves extensive travel and outdoor work.',
                'department' => 'Field Operations',
                'location' => 'Various locations in Punjab',
                'employment_type' => 'Full-time',
                'experience_level' => 'Mid',
                'salary_min' => 40000,
                'salary_max' => 60000,
                'requirements' => '• Bachelor\'s degree in Fisheries Science
• 2-3 years field experience
• Valid driving license
• Physical fitness for outdoor work
• Good communication skills
• Knowledge of local water bodies',
                'benefits' => '• Travel allowance
• Field equipment provided
• Health insurance
• Accommodation during field trips
• Performance bonuses',
                'application_deadline' => now()->addDays(25),
                'is_active' => true,
                'status' => 'open'
            ],
            [
                'title' => 'Administrative Officer',
                'description' => 'We need an Administrative Officer to handle office operations, manage documentation, and coordinate with various departments. This role is perfect for someone with strong organizational skills.',
                'department' => 'Administration',
                'location' => 'Lahore, Punjab',
                'employment_type' => 'Full-time',
                'experience_level' => 'Mid',
                'salary_min' => 50000,
                'salary_max' => 70000,
                'requirements' => '• Bachelor\'s degree in Business Administration or related field
• 3-4 years administrative experience
• Proficiency in MS Office
• Strong organizational skills
• Excellent communication skills
• Knowledge of government procedures',
                'benefits' => '• Regular working hours
• Health insurance
• Annual bonus
• Professional development opportunities
• Government benefits',
                'application_deadline' => now()->addDays(20),
                'is_active' => true,
                'status' => 'open'
            ],
            [
                'title' => 'Intern - Fisheries Management',
                'description' => 'We offer internship opportunities for fresh graduates to gain hands-on experience in fisheries management. This is a great way to start your career in the fisheries sector.',
                'department' => 'General',
                'location' => 'Lahore, Punjab',
                'employment_type' => 'Internship',
                'experience_level' => 'Entry',
                'salary_min' => 15000,
                'salary_max' => 20000,
                'requirements' => '• Recent graduate in Fisheries Science or related field
• Basic computer skills
• Eagerness to learn
• Good communication skills
• Willingness to work in different departments',
                'benefits' => '• Hands-on experience
• Mentorship program
• Certificate of completion
• Potential job opportunities
• Learning opportunities',
                'application_deadline' => now()->addDays(10),
                'is_active' => true,
                'status' => 'open'
            ]
        ];

        foreach ($jobs as $jobData) {
            Job::create($jobData);
        }
    }
}
