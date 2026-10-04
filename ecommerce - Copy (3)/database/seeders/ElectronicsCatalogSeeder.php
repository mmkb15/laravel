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
        $electronics = Category::firstOrCreate(
            ['name' => 'Electronics'],
            ['slug' => 'electronics', 'description' => 'Electronic products', 'status' => 'active']
        );

        $legacySlugs = [
            'smartphones',
            'laptops',
            'tablets',
            'cameras',
            'keyboards',
            'headphones',
            'computer-accessories',
        ];

        $legacyCategoryIds = Category::query()
            ->whereIn('slug', $legacySlugs)
            ->pluck('id')
            ->all();

        if ($legacyCategoryIds !== []) {
            Product::whereIn('category_id', $legacyCategoryIds)
                ->update(['category_id' => $electronics->id]);

            Category::query()->whereIn('id', $legacyCategoryIds)->delete();
        }

        $defaultBrand = Brand::firstOrCreate(
            ['name' => 'Demo Brand'],
            ['slug' => 'demo-brand', 'description' => 'Demo brand', 'status' => 'active']
        );

        $legacyBrandSlugs = ['apple', 'samsung', 'hp', 'canon', 'logitech', 'sony'];
        $legacyBrandIds = Brand::query()
            ->whereIn('slug', $legacyBrandSlugs)
            ->pluck('id')
            ->all();

        if ($legacyBrandIds !== []) {
            Product::whereIn('brand_id', $legacyBrandIds)
                ->update(['brand_id' => $defaultBrand->id]);

            Brand::query()->whereIn('id', $legacyBrandIds)->delete();
        }

        $brands = ['apple' => $defaultBrand, 'samsung' => $defaultBrand, 'hp' => $defaultBrand, 'canon' => $defaultBrand, 'logitech' => $defaultBrand, 'sony' => $defaultBrand];

        $products = [
            ['name' => 'iPhone 16 Pro', 'sku' => 'DEMO-EL-2001', 'brand' => 'apple', 'price' => 159900, 'sale_price' => 149900, 'stock' => 15, 'image' => 'assets/images/products/14.png'],
            ['name' => 'Samsung Galaxy S25 5G', 'sku' => 'DEMO-EL-2002', 'brand' => 'samsung', 'price' => 119900, 'sale_price' => 112900, 'stock' => 18, 'image' => 'assets/images/products/15.png'],
            ['name' => 'MacBook Air 13-inch M4', 'sku' => 'DEMO-EL-2003', 'brand' => 'apple', 'price' => 174900, 'sale_price' => 164900, 'stock' => 8, 'image' => 'assets/images/products/16.png'],
            ['name' => 'HP OmniBook 14 Laptop', 'sku' => 'DEMO-EL-2004', 'brand' => 'hp', 'price' => 124900, 'sale_price' => 114900, 'stock' => 14, 'image' => 'assets/images/products/17.png'],
            ['name' => 'Samsung Galaxy Tab S10', 'sku' => 'DEMO-EL-2005', 'brand' => 'samsung', 'price' => 89900, 'sale_price' => null, 'stock' => 10, 'image' => 'assets/images/products/18.png'],
            ['name' => 'Canon EOS R50 Mirrorless Camera', 'sku' => 'DEMO-EL-2006', 'brand' => 'canon', 'price' => 84900, 'sale_price' => 79900, 'stock' => 6, 'image' => 'assets/images/products/19.png'],
            ['name' => 'Logitech MX Keys Mini Keyboard', 'sku' => 'DEMO-EL-2007', 'brand' => 'logitech', 'price' => 16900, 'sale_price' => 14900, 'stock' => 20, 'image' => 'assets/images/products/20.png'],
            ['name' => 'Sony WH-1000XM5 Headphones', 'sku' => 'DEMO-EL-2008', 'brand' => 'sony', 'price' => 45900, 'sale_price' => 41900, 'stock' => 12, 'image' => 'assets/images/products/21.png'],
        ];

        foreach ($products as $item) {
            $product = Product::firstOrCreate(
                ['sku' => $item['sku']],
                [
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']) . '-' . strtolower(substr($item['sku'], -4)),
                    'description' => $item['name'] . ' from ' . $brands[$item['brand']]->name . '.',
                    'image' => $item['image'],
                    'category_id' => $electronics->id,
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
