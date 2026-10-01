<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

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
