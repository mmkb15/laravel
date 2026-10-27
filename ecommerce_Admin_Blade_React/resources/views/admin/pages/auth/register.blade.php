@extends('admin.layouts.single')

@section('title', 'Create Your Account')

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
                <p class="auth-eyebrow">Make yourself at home</p>
                <h1 id="auth-story-title">Your next favorite thing is waiting.</h1>
                <p class="auth-story-copy">Create an account for a smoother checkout and one place to follow every order.</p>
            </div>
            <div class="auth-story-card">
                <span class="auth-story-spark" aria-hidden="true">✦</span>
                <p>Less searching.<br><strong>More finding.</strong></p>
                <span class="auth-story-caption">A little more personal, every time</span>
            </div>
            <div class="auth-story-footer">
                <span class="auth-story-dot" aria-hidden="true"></span>
                Your store, your way
            </div>
        </section>

        <section class="auth-card auth-card-register" aria-labelledby="auth-title">
            <div class="auth-card-heading">
                <p class="auth-eyebrow">Join Carto</p>
                <h2 id="auth-title">Create your account</h2>
                <p>It only takes a minute to get started.</p>
            </div>

            <x-alert type="error" class="auth-experience-alert" :messages="$errors->all()" />

            <form class="auth-form" method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="auth-field">
                    <label for="register-name">Full name</label>
                    <input id="register-name" type="text" name="name" value="{{ old('name') }}" placeholder="Your name" autocomplete="name" required autofocus>
                </div>

                <div class="auth-field">
                    <label for="register-email">Email address</label>
                    <input id="register-email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" autocomplete="email" required>
                </div>

                <div class="auth-field">
                    <label for="register-password">Password</label>
                    <input id="register-password" type="password" name="password" placeholder="At least 8 characters" autocomplete="new-password" minlength="8" required>
                </div>

                <div class="auth-field">
                    <label for="register-password-confirmation">Confirm password</label>
                    <input id="register-password-confirmation" type="password" name="password_confirmation" placeholder="Enter your password again" autocomplete="new-password" minlength="8" required>
                </div>

                <p class="auth-privacy-note">Your details are used to manage your account and orders.</p>

                <button class="auth-submit" type="submit">
                    Create account
                    <span aria-hidden="true">&rarr;</span>
                </button>
            </form>

            <p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
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
