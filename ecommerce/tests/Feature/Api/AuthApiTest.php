<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;

uses(LazilyRefreshDatabase::class);

it('signs admins and customers in through the same API and returns their destination', function () {
    $admin = User::factory()->create([
        'email' => 'api-admin@example.com',
        'password' => 'correct-password',
        'role' => 'admin',
    ]);
    $customer = User::factory()->create([
        'email' => 'api-customer@example.com',
        'password' => 'correct-password',
        'role' => 'customer',
    ]);

    $this->withHeader('Host', 'ecommerce.test')
        ->withHeader('Origin', 'http://ecommerce.test:5173')
        ->postJson(route('api.auth.login'), [
            'email' => $admin->email,
            'password' => 'correct-password',
        ])
        ->assertOk()
        ->assertJsonPath('user.role', 'admin')
        ->assertJsonPath('redirect_url', 'http://ecommerce.test/dashboard');

    $this->postJson(route('api.auth.logout'))
        ->assertOk();

    $this->postJson(route('api.auth.login'), [
        'email' => $customer->email,
        'password' => 'correct-password',
    ])
        ->assertOk()
        ->assertJsonPath('user.role', 'customer')
        ->assertJsonPath('redirect_url', '/account');
});

it('creates and authenticates a customer account', function () {
    $this->withHeader('Origin', 'http://ecommerce.test:5173')
        ->postJson(route('api.auth.register'), [
            'name' => 'React Shopper',
            'email' => 'react-shopper@example.com',
            'password' => 'correct-password',
            'password_confirmation' => 'correct-password',
        ])
        ->assertCreated()
        ->assertJsonPath('user.name', 'React Shopper')
        ->assertJsonPath('user.role', 'customer')
        ->assertJsonPath('redirect_url', '/account');

    $customer = User::where('email', 'react-shopper@example.com')->firstOrFail();
    $this->assertAuthenticatedAs($customer);
    $this->assertModelExists($customer);
});

it('returns 422 without authenticating for invalid customer credentials', function () {
    User::factory()->create([
        'email' => 'known-shopper@example.com',
        'password' => 'correct-password',
        'role' => 'customer',
    ]);

    $this->withHeader('Origin', 'http://ecommerce.test:5173')
        ->postJson(route('api.auth.login'), [
            'email' => 'known-shopper@example.com',
            'password' => 'incorrect-password',
        ])
        ->assertUnprocessable()
        ->assertJsonPath('message', 'The provided credentials are incorrect.');

    $this->assertGuest();
});

it('returns 401 when the React client has no signed-in session', function () {
    $this->getJson(route('api.auth.user'))
        ->assertUnauthorized();
});

it('sends a generic password reset response and resets an existing account', function () {
    Notification::fake();
    $customer = User::factory()->create([
        'email' => 'reset-react-shopper@example.com',
        'password' => 'old-password',
        'role' => 'customer',
    ]);

    $this->withHeader('Origin', 'http://localhost:5173')
        ->postJson(route('api.auth.password.email'), ['email' => $customer->email])
        ->assertOk()
        ->assertJsonPath(
            'message',
            'If an account exists for that email address, a password reset link will be sent.'
        );
    Notification::assertSentTo($customer, ResetPassword::class);

    $token = Password::createToken($customer);
    $this->postJson(route('api.auth.password.update'), [
        'token' => $token,
        'email' => $customer->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ])
        ->assertOk()
        ->assertJsonPath('user.email', $customer->email)
        ->assertJsonPath('redirect_url', '/account');

    expect(Hash::check('new-password', $customer->fresh()->password))->toBeTrue();
    $this->assertAuthenticatedAs($customer);
});

it('sends an administrator to the backend dashboard after resetting their password', function () {
    $admin = User::factory()->create([
        'email' => 'reset-admin@example.com',
        'password' => 'old-password',
        'role' => 'admin',
    ]);

    $this->withHeader('Origin', 'http://ecommerce.test:5173')
        ->postJson(route('api.auth.password.update'), [
            'token' => Password::createToken($admin),
            'email' => $admin->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->assertOk()
        ->assertJsonPath('user.role', 'admin')
        ->assertJsonPath('redirect_url', route('dashboard'));
});

it('redirects emailed reset links to the React reset form', function () {
    config(['app.frontend_url' => 'http://ecommerce.test:5173']);

    $this->get(route('password.reset', [
        'token' => 'safe-reset-token',
        'email' => 'customer@example.com',
    ]))
        ->assertRedirectContains('http://ecommerce.test:5173/reset-password?')
        ->assertRedirectContains('token=safe-reset-token')
        ->assertRedirectContains('email=customer%40example.com');
});
