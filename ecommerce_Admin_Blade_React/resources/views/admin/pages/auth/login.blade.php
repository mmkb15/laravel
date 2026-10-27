@extends('admin.layouts.single')

@section('title', 'Sign In')

@section('content')
<main class="auth-experience-page">
    <header class="auth-topbar">
        <a href="{{ route('home') }}" class="auth-brand" aria-label="Carto home">
            <span class="auth-brand-mark">C</span>
            Carto
        </a>
        <nav class="auth-topbar-links" aria-label="Store navigation">
            <a href="{{ route('showcase') }}">Compare storefronts</a>
            <a href="{{ route('home') }}">Browse store</a>
        </nav>
    </header>

    <div class="auth-main">
        <section class="auth-story" aria-labelledby="auth-story-title">
            <div class="auth-story-content">
                <p class="auth-eyebrow">A better way to shop</p>
                <h1 id="auth-story-title">Good things are just around the corner.</h1>
                <p class="auth-story-copy">Sign in to keep your orders, delivery details, and favorite finds together.</p>
            </div>
            <div class="auth-story-card">
                <span class="auth-story-spark" aria-hidden="true">✦</span>
                <p>Thoughtful finds.<br><strong>Everyday favorites.</strong></p>
                <span class="auth-story-caption">Your Carto experience starts here</span>
            </div>
            <div class="auth-story-footer">
                <span class="auth-story-dot" aria-hidden="true"></span>
                Your store, your way
            </div>
        </section>

        <section class="auth-card" aria-labelledby="auth-title">
            <div class="auth-card-heading">
                <p class="auth-eyebrow">Customer account</p>
                <h2 id="auth-title">Welcome back</h2>
                <p>Sign in to continue to your account.</p>
            </div>

            <x-alert type="success" class="auth-experience-alert" :messages="session('success')" />
            <x-alert type="error" class="auth-experience-alert" :messages="$errors->all()" />

            <form class="auth-form" method="POST" action="{{ route('login.store') }}">
                @csrf

                @php
                    $demoAccounts = [
                        ['label' => 'Try Customer Demo', 'account' => config('app.demo_accounts.customer')],
                        ['label' => 'Try Admin Demo', 'account' => config('app.demo_accounts.admin')],
                    ];
                @endphp

                @if (collect($demoAccounts)->contains(fn ($demo) => filled($demo['account']['email']) && filled($demo['account']['password'])))
                    <div class="auth-demo">
                        <div class="auth-demo-heading">
                            <span>Quick demo</span>
                            <span>Optional</span>
                        </div>
                        <div class="auth-demo-buttons">
                            @foreach ($demoAccounts as $demo)
                                @if (filled($demo['account']['email']) && filled($demo['account']['password']))
                                    <button
                                        class="auth-demo-button"
                                        type="button"
                                        data-demo-email="{{ $demo['account']['email'] }}"
                                        data-demo-password="{{ $demo['account']['password'] }}"
                                    >
                                        {{ $demo['label'] }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        <p>Select a demo, then sign in.</p>
                    </div>
                @endif

                <div class="auth-field">
                    <label for="email">Email address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required autofocus>
                </div>

                <div class="auth-field">
                    <div class="auth-field-heading">
                        <label for="password">Password</label>
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <div class="auth-password-field">
                        <input id="password" type="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                        <button type="button" class="auth-password-toggle" aria-label="Show password">
                            <i class="icon-eye view" aria-hidden="true"></i>
                            <i class="icon-eye-off hide" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <label class="auth-remember">
                    <input type="checkbox" name="remember" value="1">
                    <span>Keep me signed in</span>
                </label>

                <button class="auth-submit" type="submit">
                    Sign in
                    <span aria-hidden="true">&rarr;</span>
                </button>
            </form>

            <p class="auth-switch">New to Carto? <a href="{{ route('register') }}">Create an account</a></p>
            <a class="auth-guest-link" href="{{ rtrim(config('app.frontend_url'), '/').'/' }}">Continue as guest</a>
        </section>
    </div>

    <footer class="auth-footer">
        <span>© {{ date('Y') }} Carto</span>
        <a href="{{ route('showcase') }}">Explore the storefronts</a>
    </footer>
</main>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/auth-experience.css') }}">
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-demo-email]').forEach(function (button) {
            button.addEventListener('click', function () {
                document.getElementById('email').value = button.dataset.demoEmail;
                document.getElementById('password').value = button.dataset.demoPassword;
                document.querySelector('input[name="remember"]').checked = false;
            });
        });

        document.querySelectorAll('.auth-password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = button.closest('.auth-password-field').querySelector('input');
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                button.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
                button.classList.toggle('active', isPassword);
            });
        });
    });
</script>
@endsection
