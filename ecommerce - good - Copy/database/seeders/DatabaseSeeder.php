<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSku;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '01700000000',
                'address' => 'Dhaka, Bangladesh',
                'image' => 'assets/images/avatar/user-1.png',
            ]
        );

        $customer = User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Demo Customer',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'phone' => '01800000000',
                'address' => 'Dhaka, Bangladesh',
                'image' => 'assets/images/avatar/user-2.png',
            ]
        );

        $electronics = Category::updateOrCreate(
            ['name' => 'Electronics'],
            ['slug' => 'electronics', 'description' => 'Electronic products', 'status' => 'active']
        );
        $fashion = Category::updateOrCreate(
            ['name' => 'Fashion'],
            ['slug' => 'fashion', 'description' => 'Fashion products', 'status' => 'active']
        );
        $brand = Brand::updateOrCreate(
            ['name' => 'Demo Brand'],
            ['slug' => 'demo-brand', 'description' => 'Demo brand', 'status' => 'active']
        );

        $products = [
            ['name' => 'Wireless Headphone', 'sku' => 'WH-1001', 'price' => 2500, 'sale_price' => 2200, 'stock' => 25, 'category_id' => $electronics->id, 'image' => 'assets/images/products/11.png'],
            ['name' => 'Smart Watch', 'sku' => 'SW-1002', 'price' => 4500, 'sale_price' => 3999, 'stock' => 12, 'category_id' => $electronics->id, 'image' => 'assets/images/products/12.png'],
            ['name' => 'Classic T-Shirt', 'sku' => 'TS-1003', 'price' => 1200, 'sale_price' => 999, 'stock' => 4, 'category_id' => $fashion->id, 'image' => 'assets/images/products/13.png'],
        ];

        foreach ($products as $item) {
            $product = Product::updateOrCreate(
                ['sku' => $item['sku']],
                [
                    'name' => $item['name'],
                    'slug' => Str::slug($item['name']),
                    'description' => $item['name'] . ' demo product for the admin panel.',
                    'image' => $item['image'],
                    'category_id' => $item['category_id'],
                    'brand_id' => $brand->id,
                    'price' => $item['price'],
                    'sale_price' => $item['sale_price'],
                    'stock' => $item['stock'],
                    'status' => 'active',
                ]
            );

            ProductImage::updateOrCreate(
                ['product_id' => $product->id, 'path' => $item['image']],
                ['is_primary' => true, 'sort_order' => 0]
            );

            ProductSku::updateOrCreate(
                ['product_id' => $product->id],
                [
                    'sku' => $product->sku,
                    'price' => $product->sale_price ?: $product->price,
                    'stock' => $product->stock,
                    'status' => $product->status,
                ]
            );
        }

        if (Order::count() === 0) {
            $product = Product::first();
            $unit = (float) ($product->sale_price ?: $product->price);
            $quantity = 2;
            $subtotal = $unit * $quantity;

            $order = Order::create([
                'order_number' => 'ORD-DEMO-1001',
                'user_id' => $customer->id,
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'discount' => 0,
                'total' => $subtotal,
                'payment_method' => 'cod',
                'payment_status' => 'paid',
                'status' => 'delivered',
                'shipping_name' => $customer->name,
                'shipping_phone' => $customer->phone,
                'shipping_address' => $customer->address,
            ]);

            $order->items()->create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $quantity,
                'unit_price' => $unit,
                'subtotal' => $subtotal,
            ]);
        }
    }
}
