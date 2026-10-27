@extends('admin.layouts.single')

@section('title', 'Register')

@section('content')
<div class="wrap-login-page sign-up ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('login') }}" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-user-plus"></i></div>
                <div>
                    <h3>Create an account</h3>
                    <div class="body-text">Create a customer account for your ecommerce system</div>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger auth-alert">{{ $errors->first() }}</div>
            @endif

            <form class="form-login flex flex-column gap20" method="POST" action="{{ route('register.store') }}">
                @csrf

                <fieldset class="template-field">
                    <label for="register-name">Full Name <span class="required">*</span></label>
                    <input id="register-name" class="template-input" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" autocomplete="name" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-email">Email Address <span class="required">*</span></label>
                    <input id="register-email" class="template-input" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" autocomplete="email" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-password">Password <span class="required">*</span></label>
                    <input id="register-password" class="template-input" type="password" name="password" placeholder="Minimum 8 characters" autocomplete="new-password" required>
                </fieldset>

                <fieldset class="template-field">
                    <label for="register-password-confirmation">Confirm Password <span class="required">*</span></label>
                    <input id="register-password-confirmation" class="template-input" type="password" name="password_confirmation" placeholder="Repeat your password" autocomplete="new-password" required>
                </fieldset>

                <button class="tf-button w-full" type="submit">
                    <i class="icon-user-plus"></i>
                    Create Account
                </button>
            </form>

            <div class="body-text text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="body-text tf-color">Login Now</a>
            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright © {{ date('Y') }} Mursalin Ecommerce. All rights reserved.</div>
</div>
@endsection
