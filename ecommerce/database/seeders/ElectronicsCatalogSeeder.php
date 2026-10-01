<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ElectronicsCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [];

        foreach ([
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'image' => 'assets/images/products/14.png'],
            ['name' => 'Laptops', 'slug' => 'laptops', 'image' => 'assets/images/products/16.png'],
            ['name' => 'Tablets', 'slug' => 'tablets', 'image' => 'assets/images/products/18.png'],
            ['name' => 'Cameras', 'slug' => 'cameras', 'image' => 'assets/images/products/19.png'],
            ['name' => 'Keyboards', 'slug' => 'keyboards', 'image' => 'assets/images/products/20.png'],
            ['name' => 'Headphones', 'slug' => 'headphones', 'image' => 'assets/images/products/21.png'],
            ['name' => 'Computer Accessories', 'slug' => 'computer-accessories', 'image' => 'assets/images/products/22.png'],
        ] as $categoryData) {
            $categories[$categoryData['slug']] = Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                [
                    'name' => $categoryData['name'],
                    'image' => $categoryData['image'],
                    'description' => $categoryData['name'] . ' and related electronics.',
                    'status' => 'active',
                ]
            );
        }

        $brands = [];

        foreach ([
            ['name' => 'Apple', 'slug' => 'apple'],
            ['name' => 'Samsung', 'slug' => 'samsung'],
            ['name' => 'HP', 'slug' => 'hp'],
            ['name' => 'Canon', 'slug' => 'canon'],
            ['name' => 'Logitech', 'slug' => 'logitech'],
            ['name' => 'Sony', 'slug' => 'sony'],
        ] as $brandData) {
            $brands[$brandData['slug']] = Brand::firstOrCreate(
                ['slug' => $brandData['slug']],
                [
                    'name' => $brandData['name'],
                    'description' => $brandData['name'] . ' electronics and accessories.',
                    'status' => 'active',
                ]
            );
        }

        $products = [
            ['name' => 'iPhone 16 Pro', 'sku' => 'DEMO-EL-2001', 'category' => 'smartphones', 'brand' => 'apple', 'price' => 159900, 'sale_price' => 149900, 'stock' => 15, 'image' => 'assets/images/products/14.png'],
            ['name' => 'Samsung Galaxy S25 5G', 'sku' => 'DEMO-EL-2002', 'category' => 'smartphones', 'brand' => 'samsung', 'price' => 119900, 'sale_price' => 112900, 'stock' => 18, 'image' => 'assets/images/products/15.png'],
            ['name' => 'MacBook Air 13-inch M4', 'sku' => 'DEMO-EL-2003', 'category' => 'laptops', 'brand' => 'apple', 'price' => 174900, 'sale_price' => 164900, 'stock' => 8, 'image' => 'assets/images/products/16.png'],
            ['name' => 'HP OmniBook 14 Laptop', 'sku' => 'DEMO-EL-2004', 'category' => 'laptops', 'brand' => 'hp', 'price' => 124900, 'sale_price' => 114900, 'stock' => 14, 'image' => 'assets/images/products/17.png'],
            ['name' => 'Samsung Galaxy Tab S10', 'sku' => 'DEMO-EL-2005', 'category' => 'tablets', 'brand' => 'samsung', 'price' => 89900, 'sale_price' => null, 'stock' => 10, 'image' => 'assets/images/products/18.png'],
            ['name' => 'Canon EOS R50 Mirrorless Camera', 'sku' => 'DEMO-EL-2006', 'category' => 'cameras', 'brand' => 'canon', 'price' => 84900, 'sale_price' => 79900, 'stock' => 6, 'image' => 'assets/images/products/19.png'],
            ['name' => 'Logitech MX Keys Mini Keyboard', 'sku' => 'DEMO-EL-2007', 'category' => 'keyboards', 'brand' => 'logitech', 'price' => 16900, 'sale_price' => 14900, 'stock' => 20, 'image' => 'assets/images/products/20.png'],
            ['name' => 'Sony WH-1000XM5 Headphones', 'sku' => 'DEMO-EL-2008', 'category' => 'headphones', 'brand' => 'sony', 'price' => 45900, 'sale_price' => 41900, 'stock' => 12, 'image' => 'assets/images/products/21.png'],
        ];

        foreach ($products as $item) {
            $product = Product::firstOrCreate(
                ['sku' => $item['sku']],
                [
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']) . '-' . strtolower(substr($item['sku'], -4)),
                    'description' => $item['name'] . ' from ' . $brands[$item['brand']]->name . '.',
                    'image' => $item['image'],
                    'category_id' => $categories[$item['category']]->id,
                    'brand_id' => $brands[$item['brand']]->id,
                    'price' => $item['price'],
                    'sale_price' => $item['sale_price'],
                    'stock' => $item['stock'],
                    'status' => 'active',
                ]
            );

            ProductImage::firstOrCreate(
                ['product_id' => $product->id, 'path' => $item['image']],
                ['is_primary' => true, 'sort_order' => 0]
            );

            ProductSku::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'sku' => $product->sku,
                    'price' => $product->sale_price ?: $product->price,
                    'stock' => $product->stock,
                    'status' => $product->status,
                ]
            );
        }
    }
}
