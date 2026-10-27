<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('shows only the signed-in customer orders and shipping details', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $otherCustomer = User::factory()->create(['role' => 'customer']);
    $ownOrder = Order::create([
        'order_number' => 'ACCOUNT-ORDER-100',
        'user_id' => $customer->id,
        'subtotal' => 125,
        'total' => 125,
        'shipping_name' => 'Account Shopper',
        'shipping_phone' => '01700000000',
        'shipping_address' => '10 Customer Lane',
    ]);
    $otherOrder = Order::create([
        'order_number' => 'PRIVATE-ORDER-200',
        'user_id' => $otherCustomer->id,
        'subtotal' => 250,
        'total' => 250,
        'shipping_name' => 'Another Shopper',
        'shipping_phone' => '01800000000',
        'shipping_address' => '20 Private Road',
    ]);

    $this->actingAs($customer)
        ->get(route('account.index'))
        ->assertOk()
        ->assertSeeText($ownOrder->order_number)
        ->assertDontSeeText($otherOrder->order_number);

    $this->get(route('account.orders.show', $ownOrder))
        ->assertOk()
        ->assertSeeText($ownOrder->shipping_address)
        ->assertDontSeeText($otherOrder->shipping_address);

    $this->get(route('account.orders.show', $otherOrder))
        ->assertNotFound();
});

it('requires a customer account to view the account page', function () {
    $this->get(route('account.index'))->assertRedirect(route('login'));
});

it('updates customer contact details from the account page', function () {
    $customer = User::factory()->create(['role' => 'customer']);

    $this->actingAs($customer)
        ->put(route('account.profile.update'), [
            'name' => 'New Shopper Name',
            'phone' => '01900000000',
            'address' => '5 Updated Street',
        ])
        ->assertRedirect(route('account.index'));

    $this->assertDatabaseHas('users', [
        'id' => $customer->id,
        'name' => 'New Shopper Name',
        'phone' => '01900000000',
        'address' => '5 Updated Street',
    ]);
});
