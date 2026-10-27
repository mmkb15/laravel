@extends('admin.layouts.single')

@section('title', 'Choose a New Password')

@section('content')
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('home') }}" class="auth-logo brand admin-brand" aria-label="Carto"><span class="brand-mark">C</span>Carto</a>
        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-lock"></i></div>
                <div><h3>Choose a new password</h3><div class="body-text">Use at least 8 characters.</div></div>
            </div>
            <x-alert type="error" class="auth-alert" :messages="$errors->all()" />
            <form class="form-login flex flex-column gap24" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <fieldset class="template-field">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input id="email" class="template-input" type="email" name="email" value="{{ old('email', $email) }}" autocomplete="email" required>
                </fieldset>
                <fieldset class="template-field">
                    <label for="password">New Password <span class="required">*</span></label>
                    <input id="password" class="template-input" type="password" name="password" autocomplete="new-password" required>
                </fieldset>
                <fieldset class="template-field">
                    <label for="password-confirmation">Confirm Password <span class="required">*</span></label>
                    <input id="password-confirmation" class="template-input" type="password" name="password_confirmation" autocomplete="new-password" required>
                </fieldset>
                <button class="tf-button w-full" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
