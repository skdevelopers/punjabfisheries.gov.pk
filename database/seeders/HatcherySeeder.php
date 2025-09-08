<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hatchery;

class HatcherySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hatcheries = [
            [
                'hatchery_name' => 'Dhaka Central Hatchery',
                'contact_person' => 'Dr. Ahmed Khan',
                'mobile_number' => '+880-1712-345678',
                'office_number' => '+880-2-955-1234',
                'division' => 'Dhaka',
                'district' => 'Dhaka',
                'longitude' => 90.3563,
                'latitude' => 23.8103,
                'office_type' => 'HM',
            ],
            [
                'hatchery_name' => 'Chittagong Aqua Farm',
                'contact_person' => 'Mr. Rahman Ali',
                'mobile_number' => '+880-1812-345678',
                'office_number' => '+880-31-955-1234',
                'division' => 'Chittagong',
                'district' => 'Chittagong',
                'longitude' => 91.7832,
                'latitude' => 22.3419,
                'office_type' => 'AQUA',
            ],
            [
                'hatchery_name' => 'Sylhet Integrated Hatchery',
                'contact_person' => 'Ms. Fatima Begum',
                'mobile_number' => '+880-1912-345678',
                'office_number' => '+880-821-955-1234',
                'division' => 'Sylhet',
                'district' => 'Sylhet',
                'longitude' => 91.8687,
                'latitude' => 24.8949,
                'office_type' => 'BOTH',
                'dd_adf_name' => 'Dr. Mohammad Hassan',
                'dd_adf_contact_number' => '+880-1612-345678',
            ],
            [
                'hatchery_name' => 'Rajshahi Poultry Center',
                'contact_person' => 'Mr. Karim Uddin',
                'mobile_number' => '+880-1512-345678',
                'office_number' => '+880-721-955-1234',
                'division' => 'Rajshahi',
                'district' => 'Rajshahi',
                'longitude' => 88.6042,
                'latitude' => 24.3745,
                'office_type' => 'HM',
            ],
            [
                'hatchery_name' => 'Khulna Fish Hatchery',
                'contact_person' => 'Dr. Nasreen Akter',
                'mobile_number' => '+880-1412-345678',
                'office_number' => '+880-41-955-1234',
                'division' => 'Khulna',
                'district' => 'Khulna',
                'longitude' => 89.5403,
                'latitude' => 22.8456,
                'office_type' => 'AQUA',
            ],
        ];

        foreach ($hatcheries as $hatchery) {
            Hatchery::create($hatchery);
        }
    }
}
