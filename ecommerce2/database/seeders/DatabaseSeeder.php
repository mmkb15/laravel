<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'description' => 'Everyday electronics and gadgets.',
        ]);

        $accessories = Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
            'description' => 'Useful computer and mobile accessories.',
        ]);

        $phone = Category::create([
            'parent_id' => $electronics->category_id,
            'name' => 'Smartphones',
            'slug' => 'smartphones',
        ]);

        $brand1 = Brand::create(['name' => 'Mursalin', 'slug' => 'mursalin']);
        $brand2 = Brand::create(['name' => 'TechPro', 'slug' => 'techpro']);

        $products = [
            [
                'category_id' => $phone->category_id, 'brand_id' => $brand1->brand_id,
                'name' => 'Mursalin X1 Smartphone', 'slug' => 'mursalin-x1-smartphone',
                'description' => 'A demo smartphone product for the first store flow.',
                'sku_code' => 'MUR-X1-BLK', 'price' => 24999, 'stock_quantity' => 15,
            ],
            [
                'category_id' => $accessories->category_id, 'brand_id' => $brand2->brand_id,
                'name' => 'TechPro Wireless Mouse', 'slug' => 'techpro-wireless-mouse',
                'description' => 'Comfortable wireless mouse for office and home use.',
                'sku_code' => 'TP-MOUSE-01', 'price' => 1290, 'stock_quantity' => 30,
            ],
            [
                'category_id' => $accessories->category_id, 'brand_id' => $brand2->brand_id,
                'name' => 'TechPro USB-C Cable', 'slug' => 'techpro-usb-c-cable',
                'description' => 'Durable USB-C charging and data cable.',
                'sku_code' => 'TP-CABLE-01', 'price' => 590, 'stock_quantity' => 50,
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'category_id' => $data['category_id'],
                'brand_id' => $data['brand_id'],
                'name' => $data['name'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'is_active' => true,
            ]);

            $product->skus()->create([
                'sku_code' => $data['sku_code'],
                'price' => $data['price'],
                'stock_quantity' => $data['stock_quantity'],
            ]);
        }
    }
}
