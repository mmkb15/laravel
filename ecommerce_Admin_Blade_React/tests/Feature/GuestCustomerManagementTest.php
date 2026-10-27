<?php

use App\Models\GuestCustomer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(LazilyRefreshDatabase::class);

it('updates a guest profile and image, then deletes only the profile', function () {
    Storage::fake('public');
    $admin = User::factory()->create(['role' => 'admin']);
    $guestCustomer = GuestCustomer::create([
        'name' => 'Original Guest',
        'email' => 'original@example.com',
        'phone' => '+1 202 555 0134',
        'address' => 'Old address',
        'image' => 'guest-customers/original.jpg',
    ]);
    Storage::disk('public')->put($guestCustomer->image, 'old image');

    $firstOrder = Order::create([
        'order_number' => 'GUEST-ORDER-001',
        'guest_customer_id' => $guestCustomer->id,
        'shipping_name' => 'Original Guest',
        'shipping_phone' => $guestCustomer->phone,
        'shipping_address' => 'Old address',
        'customer_email' => 'original@example.com',
    ]);
    $secondOrder = Order::create([
        'order_number' => 'GUEST-ORDER-002',
        'guest_customer_id' => $guestCustomer->id,
        'shipping_name' => 'Original Guest',
        'shipping_phone' => $guestCustomer->phone,
        'shipping_address' => 'Old address',
        'customer_email' => 'original@example.com',
    ]);

    $this->actingAs($admin)
        ->get(route('users.guests.edit', $guestCustomer))
        ->assertOk()
        ->assertSee('Original Guest')
        ->assertSee('Upload New Image');

    $this->put(route('users.guests.update', $guestCustomer), [
        'name' => 'Updated Guest',
        'email' => 'updated@example.com',
        'phone' => '+1 202 555 0134',
        'address' => 'New address',
        'image' => UploadedFile::fake()->image('guest.png'),
    ])->assertRedirect(route('users.guests'));

    $guestCustomer->refresh();
    expect($guestCustomer->name)->toBe('Updated Guest')
        ->and($guestCustomer->email)->toBe('updated@example.com')
        ->and($guestCustomer->address)->toBe('New address')
        ->and($guestCustomer->image)->not->toBe('guest-customers/original.jpg');
    Storage::disk('public')->assertMissing('guest-customers/original.jpg');
    Storage::disk('public')->assertExists($guestCustomer->image);
    expect($firstOrder->fresh()->shipping_name)->toBe('Original Guest')
        ->and($firstOrder->fresh()->shipping_address)->toBe('Old address')
        ->and($secondOrder->fresh()->guest_customer_id)->toBe($guestCustomer->id);

    $this->delete(route('users.guests.destroy', $guestCustomer))
        ->assertRedirect(route('users.guests'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('guest_customers', ['id' => $guestCustomer->id]);
    $this->assertDatabaseHas('orders', [
        'id' => $firstOrder->id,
        'guest_customer_id' => null,
        'shipping_name' => 'Original Guest',
        'shipping_address' => 'Old address',
        'customer_email' => 'original@example.com',
    ]);
    $this->assertDatabaseHas('orders', ['id' => $secondOrder->id]);
    Storage::disk('public')->assertMissing($guestCustomer->image);
});

it('rejects a duplicate guest phone number', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $guestCustomer = GuestCustomer::create([
        'name' => 'First Guest',
        'phone' => '+1 202 555 0101',
    ]);
    GuestCustomer::create([
        'name' => 'Second Guest',
        'phone' => '+1 202 555 0102',
    ]);

    $this->actingAs($admin)
        ->put(route('users.guests.update', $guestCustomer), [
            'name' => 'First Guest',
            'phone' => '+1 202 555 0102',
        ])
        ->assertSessionHasErrors('phone');

    expect($guestCustomer->fresh()->phone)->toBe('+1 202 555 0101');
});
