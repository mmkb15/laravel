<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Product::factory(20)->create();
        Brand::factory(5)->create();
        
        Role::factory()->createMany([
            ['name' => 'Admin'],
            ['name' => 'Sales Person'],
            ['name' => 'Editor'],
            ['name' => 'Vendor'],
        ]);

        Category::factory()->createMany([
            ['name' => 'Clothes'],
            ['name' => 'Watches'],
            ['name' => 'Glasses'],
            ['name' => 'Shoes'],
        ]);


    }
}
