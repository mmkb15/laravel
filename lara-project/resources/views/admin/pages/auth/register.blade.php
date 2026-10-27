@extends('admin.layouts.single-master')

<!-- Title -->
@section('title','Register')

<!-- Content -->
@section('content')
<div class="login-card">
    
    <!-- Brand Identity -->
    <a href="index.html" class="login-brand text-decoration-none">
        <i class="bi bi-asterisk"></i>
        <span>Spark Admin</span>
    </a>
    
    <p class="login-subtitle">Please Sign up to to continue</p>
    
    <!-- Login Form -->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        <!-- Name Input Group -->
        <div class="login-form-group">
            <label for="name" class="login-form-label">Full Name </label>
            <div class="login-input-group">
                <i class="bi bi-envelope input-icon"></i>
                <input type="name" name="name" id="name" class="login-input" placeholder="Enter Your Name" value="{{ old('name')}}">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
        </div>

        <!-- Email Input Group -->
        <div class="login-form-group">
            <label for="email" class="login-form-label">Email Address</label>
            <div class="login-input-group">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" name="email" id="email" class="login-input" placeholder="Enter Your Email" value="{{ old('email') }}">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>
        
        <!-- Password Input Group -->
        <div class="login-form-group">
            <label for="password" class="login-form-label">Password</label>
            <div class="login-input-group">
                <i class="bi bi-shield-lock input-icon"></i>
                <input type="password" name="password"  id="password" class="login-input login-input-password" placeholder="••••••••" value="{{ old('password') }}">
                <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>
        
        <!-- Confirmation Password Input Group -->
        <div class="login-form-group">
            <label for="password_confirmation" class="login-form-label">Confirm Password</label>
            <div class="login-input-group">
                <i class="bi bi-shield-lock input-icon"></i>
                <input type="password" name="password_confirmation"  id="password_confirmation" class="login-input login-input-password" placeholder="••••••••" value="{{ old('password_confirmation')}}">
                <button type="button" class="password-toggle-btn" id="toggle-password-confirmation" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        
        <!-- Submit Button -->
        <button type="submit" class="btn-login" id="btn-submit">
            <span>Register Now</span>
            <i class="bi bi-arrow-right"></i>
        </button>
        
    </form>
    
    <!-- Divider -->
    <div class="login-divider">Or sign up with</div>
    
    <!-- Social Logins -->
    <div class="social-login-grid">
        <button class="btn-social" type="button" id="btn-google">
            <i class="bi bi-google text-danger"></i>
            <span>Google</span>
        </button>
        <button class="btn-social" type="button" id="btn-github">
            <i class="bi bi-github"></i>
            <span>GitHub</span>
        </button>
    </div>
    
    <!-- Footer Link -->
    <p class="login-footer-text">
       Don't have an account? <a href="{{ route('register') }}" id="link-register">Register Now</a>
    </p>
    
</div>
@endsection