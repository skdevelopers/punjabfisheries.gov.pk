<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Add others as needed (PunjabGeoSeeder, Org seeds, etc.)
        $this->call([
            SliderSeeder::class,
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            BlogPostSeeder::class,
            HatcherySeeder::class,
            RbacBootstrapSeeder::class,
            ActualModulesPermissionsSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Salman',
            'email' => 'admin@punjabfisheries.gov.pk',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',

        ]);
    }
}
