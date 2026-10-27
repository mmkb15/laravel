<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;

uses(LazilyRefreshDatabase::class);

it('renders the Blade sign-in and registration pages from Laravel auth URLs', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);
    config([
        'app.demo_accounts.admin' => ['email' => 'demo-admin@example.com', 'password' => 'demo-password'],
        'app.demo_accounts.customer' => ['email' => 'demo-customer@example.com', 'password' => 'demo-password'],
    ]);

    $this->get(route('login'))
        ->assertOk()
        ->assertViewIs('admin.pages.auth.login')
        ->assertSeeText('Try Admin Demo')
        ->assertSeeText('Try Customer Demo')
        ->assertSeeText('Continue as guest')
        ->assertSee('data-demo-email="demo-admin@example.com"', false)
        ->assertSee('data-demo-password="demo-password"', false)
        ->assertSee('href="http://ecommerce.test:5173/"', false);

    $this->get(route('register'))
        ->assertOk()
        ->assertViewIs('admin.pages.auth.register');
});

it('redirects administrators and customers to their role-specific pages after login', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);

    $admin = User::factory()->create([
        'email' => 'admin-login@example.com',
        'password' => 'correct-password',
        'role' => 'admin',
    ]);
    $customer = User::factory()->create([
        'email' => 'customer-login@example.com',
        'password' => 'correct-password',
        'role' => 'customer',
    ]);

    $this->post(route('login.store'), [
        'email' => $admin->email,
        'password' => 'correct-password',
    ])->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($admin);

    auth()->logout();
    $this->post(route('login.store'), [
        'email' => $customer->email,
        'password' => 'correct-password',
    ])->assertRedirect('http://ecommerce.test:5173/account');
    $this->assertAuthenticatedAs($customer);
});

it('returns signed-out administrators to the Blade sign-in page', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->post(route('logout'))
        ->assertRedirect(route('login'));

    $this->assertGuest();
});

it('registers customers and signs them in immediately', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);

    $this->post(route('register.store'), [
        'name' => 'Registered Shopper',
        'email' => 'shopper@example.com',
        'password' => 'correct-password',
        'password_confirmation' => 'correct-password',
    ])->assertRedirect('http://ecommerce.test:5173/account');

    $customer = User::where('email', 'shopper@example.com')->firstOrFail();
    expect($customer->role)->toBe('customer');
    $this->assertAuthenticatedAs($customer);
});

it('denies customer access to admin pages and administrator access to customer pages', function () {
    $customer = User::factory()->create(['role' => 'customer']);
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($customer)->get(route('dashboard'))->assertForbidden();
    $this->actingAs($admin)->get(route('account.index'))->assertForbidden();
});

it('sends a reset link and lets a customer set a new password', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);
    Notification::fake();
    $customer = User::factory()->create([
        'email' => 'reset-customer@example.com',
        'password' => 'old-password',
        'role' => 'customer',
    ]);

    $this->post(route('password.email'), ['email' => $customer->email])
        ->assertSessionHas('status');
    Notification::assertSentTo($customer, ResetPassword::class);

    $token = Password::createToken($customer);
    $this->post(route('password.update'), [
        'token' => $token,
        'email' => $customer->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ])->assertRedirect('http://ecommerce.test:5173/account');

    expect(Hash::check('new-password', $customer->fresh()->password))->toBeTrue();
    $this->assertAuthenticatedAs($customer);
});
