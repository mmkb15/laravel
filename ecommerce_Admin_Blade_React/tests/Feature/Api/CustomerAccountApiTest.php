<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

it('returns only the authenticated customers orders', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $otherCustomer = User::factory()->create(['role' => 'customer']);
    $ownOrder = Order::create([
        'order_number' => 'REACT-ACCOUNT-100',
        'user_id' => $customer->id,
        'subtotal' => 100,
        'total' => 100,
        'shipping_name' => 'Account Shopper',
        'shipping_phone' => '01700000000',
        'shipping_address' => '10 Customer Lane',
    ]);
    Order::create([
        'order_number' => 'REACT-PRIVATE-200',
        'user_id' => $otherCustomer->id,
        'subtotal' => 200,
        'total' => 200,
        'shipping_name' => 'Another Shopper',
        'shipping_phone' => '01800000000',
        'shipping_address' => '20 Private Road',
    ]);

    $this->actingAs($customer)
        ->getJson(route('api.account.orders.index'))
        ->assertOk()
        ->assertJsonPath('orders.data.0.order_number', $ownOrder->order_number)
        ->assertJsonMissing(['order_number' => 'REACT-PRIVATE-200']);
});

it('returns 404 when a customer requests another customers order', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $otherCustomer = User::factory()->create(['role' => 'customer']);
    $otherOrder = Order::create([
        'order_number' => 'REACT-PRIVATE-ORDER',
        'user_id' => $otherCustomer->id,
        'subtotal' => 200,
        'total' => 200,
        'shipping_name' => 'Another Shopper',
        'shipping_phone' => '01800000000',
        'shipping_address' => '20 Private Road',
    ]);

    $this->actingAs($customer)
        ->getJson(route('api.account.orders.show', $otherOrder->id))
        ->assertNotFound();
});

it('returns product image urls for items in an order', function () {
    Storage::fake('public');
    Storage::disk('public')->put('products/order-keyboard.png', 'image');

    $customer = User::factory()->create(['role' => 'customer']);
    $category = Category::create([
        'name' => 'Order Image Category',
        'slug' => 'order-image-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Order Keyboard',
        'slug' => 'order-keyboard',
        'category_id' => $category->id,
        'sku' => 'ORDER-KEYBOARD-001',
        'price' => 100,
        'stock' => 2,
        'status' => 'active',
    ]);
    ProductImage::create([
        'product_id' => $product->id,
        'path' => 'products/order-keyboard.png',
        'is_primary' => true,
    ]);
    $order = Order::create([
        'order_number' => 'REACT-IMAGE-ORDER',
        'user_id' => $customer->id,
        'subtotal' => 100,
        'total' => 100,
        'shipping_name' => 'Account Shopper',
        'shipping_phone' => '01700000000',
        'shipping_address' => '10 Customer Lane',
    ]);
    $order->items()->create([
        'product_id' => $product->id,
        'product_name' => 'Order Keyboard',
        'quantity' => 1,
        'unit_price' => 100,
        'subtotal' => 100,
    ]);

    $this->actingAs($customer)
        ->getJson(route('api.account.orders.show', $order->id))
        ->assertOk()
        ->assertJsonPath('order.items.0.image_url', Storage::disk('public')->url('products/order-keyboard.png'));
});

it('returns 403 when an administrator requests the customer account API', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->getJson(route('api.account.orders.index'))
        ->assertForbidden();
});

it('updates only customer contact fields and rejects invalid profile data', function () {
    $customer = User::factory()->create([
        'name' => 'Original Customer',
        'role' => 'customer',
    ]);

    $this->actingAs($customer)
        ->putJson(route('api.account.profile.update'), [
            'name' => 'Updated Customer',
            'phone' => '01900000000',
            'address' => '5 Updated Street',
            'role' => 'admin',
        ])
        ->assertOk()
        ->assertJsonPath('user.name', 'Updated Customer')
        ->assertJsonPath('user.role', 'customer');

    $this->assertDatabaseHas('users', [
        'id' => $customer->id,
        'name' => 'Updated Customer',
        'phone' => '01900000000',
        'address' => '5 Updated Street',
        'role' => 'customer',
    ]);

    $this->putJson(route('api.account.profile.update'), [
        'name' => '',
        'phone' => '01900000000',
        'address' => '5 Updated Street',
    ])
        ->assertUnprocessable()
        ->assertJsonValidationErrors('name');
});

it('returns 401 when a guest requests customer account data', function () {
    $this->getJson(route('api.account.orders.index'))
        ->assertUnauthorized();
});
