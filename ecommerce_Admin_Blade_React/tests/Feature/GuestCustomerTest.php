<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('keeps guest orders out of registered users and lists guest customers separately', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $category = Category::create([
        'name' => 'Guest Checkout Category',
        'slug' => 'guest-checkout-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Guest Checkout Product',
        'slug' => 'guest-checkout-product',
        'category_id' => $category->id,
        'sku' => 'GUEST-CHECKOUT-001',
        'price' => 100,
        'stock' => 3,
        'status' => 'active',
    ]);

    foreach ([1, 2] as $order) {
        $this->postJson('/api/orders', [
            'items' => [['id' => $product->id, 'quantity' => 1]],
            'shipping_name' => 'Online Buyer Example',
            'shipping_phone' => '+1 (202) 555-0134',
            'shipping_address' => '1 Guest Street',
            'customer_email' => 'guest@example.com',
        ])->assertOk()
            ->assertJsonStructure(['message', 'order_number']);
    }

    $this->assertDatabaseHas('orders', [
        'user_id' => null,
        'shipping_name' => 'Online Buyer Example',
        'customer_email' => 'guest@example.com',
    ]);
    $this->assertDatabaseHas('guest_customers', [
        'name' => 'Online Buyer Example',
        'phone' => '+1 (202) 555-0134',
        'email' => 'guest@example.com',
    ]);
    expect(DB::table('orders')->whereNotNull('guest_customer_id')->count())->toBe(2);
    expect($product->fresh()->stock)->toBe(1);

    $this->actingAs($admin)
        ->get(route('users.guests'))
        ->assertOk()
        ->assertSeeText('Guest Customers')
        ->assertSeeText('1 guest customer(s)')
        ->assertSeeText('guest@example.com')
        ->assertSeeText('Online Buyer Example')
        ->assertSeeText('2')
        ->assertSee(asset('assets/images/avatar/guest-default.svg'), false)
        ->assertSee('Edit guest customer')
        ->assertSee('Delete guest profile');

    $this->get(route('users.index'))
        ->assertOk()
        ->assertDontSeeText('guest@example.com')
        ->assertDontSeeText('Online Buyer Example');
});

it('requires authentication to view guest customer contact details', function () {
    $this->get(route('users.guests'))
        ->assertRedirect(route('login'));
});

it('associates a signed-in customer checkout with their account', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $category = Category::create([
        'name' => 'Customer Checkout Category',
        'slug' => 'customer-checkout-category',
        'status' => 'active',
    ]);
    $product = Product::create([
        'name' => 'Customer Checkout Product',
        'slug' => 'customer-checkout-product',
        'category_id' => $category->id,
        'sku' => 'CUSTOMER-CHECKOUT-001',
        'price' => 150,
        'stock' => 2,
        'status' => 'active',
    ]);

    $this->post(route('login.store'), [
        'email' => $customer->email,
        'password' => 'password',
    ])->assertRedirect(route('account.index'));

    $this->withHeader('Origin', 'http://localhost:5173')
        ->postJson('/api/orders', [
            'items' => [['id' => $product->id, 'quantity' => 1]],
            'shipping_name' => $customer->name,
            'shipping_phone' => '01700000001',
            'shipping_address' => '1 Customer Street',
            'customer_email' => $customer->email,
        ])
        ->assertOk()
        ->assertJsonStructure(['message', 'order_number']);

    $this->assertDatabaseHas('orders', [
        'user_id' => $customer->id,
        'guest_customer_id' => null,
        'customer_email' => $customer->email,
    ]);
    $this->assertDatabaseMissing('guest_customers', [
        'phone' => '01700000001',
    ]);
});
