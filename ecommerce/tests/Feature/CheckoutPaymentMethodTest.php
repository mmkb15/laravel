<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('shows only cash on delivery to customers and admins', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->get(route('cart'))
        ->assertSeeText('Cash on delivery')
        ->assertDontSeeText('Bank transfer');

    $this->actingAs($admin)
        ->get(route('orders.create'))
        ->assertSeeText('Cash on Delivery')
        ->assertDontSeeText('Bank Transfer');
});

it('rejects bank transfer checkout requests', function () {
    $category = Category::create([
        'name' => 'Payment Category',
        'slug' => 'payment-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Payment Test Product',
        'slug' => 'payment-test-product',
        'category_id' => $category->id,
        'sku' => 'PAYMENT-TEST-001',
        'price' => 100,
        'stock' => 3,
        'status' => 'active',
    ]);

    $this->post(route('checkout.store'), [
        'shipping_name' => 'Test Customer',
        'shipping_phone' => '01700000000',
        'shipping_address' => '1 Test Street, Dhaka',
        'payment_method' => 'bank',
        'items' => [[
            'product_id' => $product->id,
            'quantity' => 1,
        ]],
    ])->assertSessionHasErrors('payment_method');

    $this->assertDatabaseCount('orders', 0);
    expect($product->fresh()->stock)->toBe(3);
});

it('rejects bank transfer when an admin creates an order', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $category = Category::create([
        'name' => 'Admin Payment Category',
        'slug' => 'admin-payment-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Admin Payment Test Product',
        'slug' => 'admin-payment-test-product',
        'category_id' => $category->id,
        'sku' => 'ADMIN-PAYMENT-TEST-001',
        'price' => 100,
        'stock' => 3,
        'status' => 'active',
    ]);

    $this->actingAs($admin)
        ->post(route('orders.store'), [
            'product_id' => $product->id,
            'quantity' => 1,
            'payment_method' => 'bank',
            'shipping_name' => 'Test Customer',
            'shipping_phone' => '01700000000',
            'shipping_address' => '1 Test Street, Dhaka',
        ])
        ->assertSessionHasErrors('payment_method');

    $this->assertDatabaseCount('orders', 0);
    expect($product->fresh()->stock)->toBe(3);
});
