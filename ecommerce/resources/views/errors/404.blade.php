@extends('admin.layouts.single')

@section('title', '404 - Page Not Found')

@section('content')
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('login') }}" class="auth-logo" aria-label="Mursalin Ecommerce">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Mursalin Ecommerce">
        </a>

        <div class="login-box">
            <div class="box-404 ecom-404-box">
                <div class="ecom-404-illustration" aria-hidden="true">
                    <div class="ecom-404-circle">404</div>
                    <div class="ecom-404-card">
                        <i class="icon-file"></i>
                        <span></span>
                        <span></span>
                        <span class="short"></span>
                    </div>
                </div>

                <h3>Oops! Page not found</h3>
                <div class="body-text">The page you are looking for does not exist, has been moved, or is temporarily unavailable.</div>

                <div class="auth-box-actions">
                    @auth
                        <a href="{{ route('dashboard') }}" class="tf-button">Go to Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="tf-button">Go to Login</a>
                    @endauth
                    <a href="javascript:history.back()" class="tf-button style-2">Go Back</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright © {{ date('Y') }} Mursalin Ecommerce. All rights reserved.</div>
</div>
@endsection
