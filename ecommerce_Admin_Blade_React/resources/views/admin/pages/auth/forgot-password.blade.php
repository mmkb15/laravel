@extends('admin.layouts.single')

@section('title', 'Forgot Password')

@section('content')
<div class="wrap-login-page ecom-auth-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('home') }}" class="auth-logo brand admin-brand" aria-label="Carto"><span class="brand-mark">C</span>Carto</a>
        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-lock"></i></div>
                <div><h3>Reset your password</h3><div class="body-text">We’ll email you a secure reset link if your account exists.</div></div>
            </div>
            @if(session('status'))<div class="auth-alert">{{ session('status') }}</div>@endif
            <x-alert type="error" class="auth-alert" :messages="$errors->all()" />
            <form class="form-login flex flex-column gap24" method="POST" action="{{ route('password.email') }}">
                @csrf
                <fieldset class="template-field">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input id="email" class="template-input" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                </fieldset>
                <button class="tf-button w-full" type="submit">Send Reset Link</button>
            </form>
            <div class="body-text text-center"><a href="{{ route('login') }}" class="body-text tf-color">Back to sign in</a></div>
        </div>
    </div>
</div>
@endsection
