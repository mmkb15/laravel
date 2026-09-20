@extends('admin.layouts.single')

@section('title', 'Admin Login')

@section('content')
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('login') }}" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-lock"></i></div>
                <div>
                    <h3>Welcome back</h3>
                    <div class="body-text">Sign in to manage your ecommerce store</div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success auth-alert">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger auth-alert">{{ $errors->first() }}</div>
            @endif

            <form class="form-login flex flex-column gap24" method="POST" action="{{ route('login.store') }}">
                @csrf

                <fieldset class="template-field">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input id="email" class="template-input" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" autocomplete="email" required>
                </fieldset>

                <fieldset class="template-field password">
                    <label for="password">Password <span class="required">*</span></label>
                    <div class="auth-password-field">
                        <input id="password" class="template-input password-input" type="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
                        <button type="button" class="show-pass auth-password-toggle" aria-label="Show password">
                            <i class="icon-eye view"></i>
                            <i class="icon-eye-off hide"></i>
                        </button>
                    </div>
                </fieldset>

                <div class="flex items-center justify-between gap15 flex-wrap">
                    <label class="auth-check">
                        <input type="checkbox" name="remember" value="1">
                        <span>Keep me signed in</span>
                    </label>
                </div>

                <button class="tf-button w-full" type="submit">
                    <i class="icon-log-in"></i>
                    Login
                </button>
            </form>

            <div class="auth-demo-box">
                <div class="text-tiny">Demo Admin Account</div>
                <div class="body-text"><strong>admin@example.com</strong> &nbsp; / &nbsp; <strong>password</strong></div>
            </div>

            <div class="body-text text-center">
                Need a customer account?
                <a href="{{ route('register') }}" class="body-text tf-color">Register Now</a>
            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright © {{ date('Y') }} Mursalin Ecommerce. All rights reserved.</div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.auth-password-toggle').forEach(function (button) {
            button.addEventListener('click', function () {
                const input = button.closest('.auth-password-field').querySelector('input');
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                button.classList.toggle('active', isPassword);
            });
        });
    });
</script>
@endsection
