<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

it('shows active products and categories on the storefront homepage', function () {
    $category = Category::create([
        'name' => 'Audio',
        'slug' => 'audio',
        'status' => 'active',
    ]);

    $hiddenCategory = Category::create([
        'name' => 'Hidden Category',
        'slug' => 'hidden-category',
        'status' => 'inactive',
    ]);

    Product::create([
        'name' => 'Studio Headphones',
        'slug' => 'studio-headphones',
        'category_id' => $category->id,
        'sku' => 'STUDIO-001',
        'price' => 2500,
        'stock' => 7,
        'status' => 'active',
    ]);

    Product::create([
        'name' => 'Hidden Headphones',
        'slug' => 'hidden-headphones',
        'category_id' => $category->id,
        'sku' => 'HIDDEN-001',
        'price' => 2800,
        'stock' => 2,
        'status' => 'inactive',
    ]);

    Product::create([
        'name' => 'Hidden Category Speaker',
        'slug' => 'hidden-category-speaker',
        'category_id' => $hiddenCategory->id,
        'sku' => 'HIDDEN-002',
        'price' => 3200,
        'stock' => 3,
        'status' => 'active',
    ]);

    $response = $this->get('/');

    $response
        ->assertOk()
        ->assertSeeText('Studio Headphones')
        ->assertSeeText('Audio')
        ->assertSeeText('In stock · 7 items')
        ->assertDontSeeText('Hidden Headphones')
        ->assertDontSeeText('Hidden Category');
});

it('shows active brand logos that link to their filtered shop products', function () {
    $category = Category::create([
        'name' => 'Computers',
        'slug' => 'computers',
        'status' => 'active',
    ]);

    $brand = Brand::create([
        'name' => 'Test Devices',
        'slug' => 'test-devices',
        'status' => 'active',
    ]);

    Product::create([
        'name' => 'Test Laptop',
        'slug' => 'test-laptop',
        'category_id' => $category->id,
        'brand_id' => $brand->id,
        'sku' => 'TEST-LAPTOP-001',
        'price' => 1200,
        'stock' => 4,
        'status' => 'active',
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSeeText($brand->name)
        ->assertSee(route('shop', ['brands' => [$brand->slug]]), false);
});

it('shows a catalog product with its transparent cutout in the homepage hero', function () {
    $category = Category::create([
        'name' => 'Wearables',
        'slug' => 'wearables',
        'status' => 'active',
    ]);

    $product = Product::create([
        'name' => 'Samsung Galaxy Watch 7',
        'slug' => 'samsung-galaxy-watch-7-18',
        'category_id' => $category->id,
        'sku' => 'HERO-WATCH-001',
        'price' => 12000,
        'stock' => 5,
        'status' => 'active',
    ]);

    $this->get('/')
        ->assertOk()
        ->assertSeeText($product->name)
        ->assertSee(asset('assets/images/products/hero-cutouts/' . $product->slug . '.png'), false)
        ->assertSee(route('product', $product->slug), false);
});

it('uses the product fallback image when uploaded image files are missing', function () {
    Storage::fake('public');

    $category = Category::create([
        'name' => 'Missing Image Category',
        'slug' => 'missing-image-category',
        'status' => 'active',
    ]);

    $product = Product::create([
        'name' => 'Product With Deleted Photo',
        'slug' => 'product-with-deleted-photo',
        'image' => 'products/deleted-product-photo.jpg',
        'category_id' => $category->id,
        'sku' => 'DELETED-PHOTO-001',
        'price' => 1000,
        'stock' => 5,
        'status' => 'active',
    ]);

    $galleryImage = ProductImage::create([
        'product_id' => $product->id,
        'path' => 'products/deleted-gallery-photo.jpg',
        'is_primary' => true,
    ]);

    $this->get(route('product', $product->slug))
        ->assertOk()
        ->assertSee(asset('assets/images/products/1.png'), false);

    expect($galleryImage->url)->toBe(asset('assets/images/products/1.png'))
        ->and($product->image_url)->toBe(asset('assets/images/products/1.png'));
});

it('renders the browser-backed cart and inline checkout views', function () {
    $this->get(route('cart'))
        ->assertOk()
        ->assertSee('data-cart-page', false)
        ->assertSee('data-cart-items', false)
        ->assertSee('data-open-checkout', false)
        ->assertSee('data-checkout-view', false);
});

it('creates an order and reduces stock at checkout', function () {
    $category = Category::create([
        'name' => 'Checkout Category',
        'slug' => 'checkout-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Checkout Speaker',
        'slug' => 'checkout-speaker',
        'category_id' => $category->id,
        'sku' => 'CHECKOUT-001',
        'price' => 1000,
        'sale_price' => 900,
        'stock' => 4,
        'status' => 'active',
    ]);

    $this->post(route('checkout.store'), [
            'shipping_name' => 'Test Customer',
            'shipping_phone' => '01700000000',
            'shipping_address' => '1 Test Street, Dhaka',
            'payment_method' => 'cod',
            'items' => [[
                'product_id' => $product->id,
                'quantity' => 2,
            ]],
        ])
        ->assertRedirect(route('cart', ['ordered' => 1]));

    $this->assertDatabaseHas('orders', [
        'shipping_name' => 'Test Customer',
        'subtotal' => 1800,
        'total' => 1800,
    ]);
    $this->assertDatabaseHas('order_items', [
        'product_id' => $product->id,
        'quantity' => 2,
        'unit_price' => 900,
        'subtotal' => 1800,
    ]);
    expect($product->fresh()->stock)->toBe(2);
});

it('keeps only the base catalog categories and assigns products to them', function () {
    $this->seed(DatabaseSeeder::class);

    expect(Category::query()->whereIn('slug', [
        'smartphones',
        'laptops',
        'tablets',
        'cameras',
        'keyboards',
        'headphones',
        'computer-accessories',
    ])->count())->toBe(0)
        ->and(Category::query()->whereIn('name', ['Electronics', 'Fashion'])->count())->toBeGreaterThanOrEqual(2);
});
