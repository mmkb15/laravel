<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Electronics', 'Fashion', 'Food & Grocery', 'Home & Living', 'Beauty & Health'];

        foreach ($names as $name) {
            Category::firstOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name) . '-' . uniqid()]
            );
        }
    }
}
