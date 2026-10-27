<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class StorefrontCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Speakers',
                'slug' => 'speakers',
                'image' => 'assets/images/categories/speakers.svg',
                'description' => 'Speakers and audio systems.',
            ],
            [
                'name' => 'Cameras',
                'slug' => 'cameras',
                'image' => 'assets/images/categories/cameras.svg',
                'description' => 'Digital cameras and photography equipment.',
            ],
            [
                'name' => 'Printers',
                'slug' => 'printers',
                'image' => 'assets/images/categories/printers.svg',
                'description' => 'Printers and printing accessories.',
            ],
            [
                'name' => 'Chargers',
                'slug' => 'chargers',
                'image' => 'assets/images/categories/chargers.svg',
                'description' => 'Chargers and power accessories.',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                $category + ['status' => 'active']
            );
        }
    }
}
