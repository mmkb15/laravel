@extends('admin.layouts.single')

@section('title', 'Sign In')

@section('content')
<div class="wrap-login-page ecom-auth-page ecom-login-page">
    <div class="flex-grow flex flex-column justify-center gap30">
        <a href="{{ route('home') }}" class="auth-logo brand admin-brand" aria-label="Carto">
            <span class="brand-mark">C</span>
            Carto
        </a>

        <div class="login-box auth-login-box">
            <div class="auth-heading">
                <div class="auth-icon"><i class="icon-lock"></i></div>
                <div>
                    <h3>Welcome back</h3>
                    <div class="body-text">Sign in to your Carto account</div>
                </div>
            </div>

            <x-alert type="success" class="auth-alert" :messages="session('success')" />
            <x-alert type="error" class="auth-alert" :messages="$errors->all()" />

            <form class="form-login flex flex-column gap24" method="POST" action="{{ route('login.store') }}">
                @csrf

                @php
                    $demoAccounts = [
                        ['label' => 'Try Admin Demo', 'account' => config('app.demo_accounts.admin')],
                        ['label' => 'Try Customer Demo', 'account' => config('app.demo_accounts.customer')],
                    ];
                @endphp

                @if (collect($demoAccounts)->contains(fn ($demo) => filled($demo['account']['email']) && filled($demo['account']['password'])))
                    <div class="demo-access">
                        <div class="body-text">Choose a demo role</div>
                        <div class="demo-access-buttons">
                            @foreach ($demoAccounts as $demo)
                                @if (filled($demo['account']['email']) && filled($demo['account']['password']))
                                    <button
                                        class="tf-button style-2"
                                        type="button"
                                        data-demo-email="{{ $demo['account']['email'] }}"
                                        data-demo-password="{{ $demo['account']['password'] }}"
                                    >
                                        {{ $demo['label'] }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                        <div class="text-tiny">Select a role to fill the form, then click Login.</div>
                    </div>
                @endif

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

                <div class="text-right">
                    <a href="{{ route('password.request') }}" class="body-text tf-color">Forgot password?</a>
                </div>

                <button class="tf-button w-full" type="submit">
                    <i class="icon-log-in"></i>
                    Login
                </button>
            </form>

            <div class="body-text text-center">
                New to Carto?
                <a href="{{ route('register') }}" class="body-text tf-color">Register Now</a>
            </div>
            <a class="demo-guest-link" href="{{ rtrim(config('app.frontend_url'), '/').'/' }}">Continue as guest</a>
        </div>
    </div>

    <div class="text-tiny">© {{ date('Y') }} | All Rights Reserved. Developed by Mustafa Mursalin Khan (1295365) (WDPF Round-70) as an assignment of ISDB-BISEW IT Scholarship Programme</div>
</div>
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
                button.classList.toggle('active', isPassword);
            });
        });
    });
</script>
@endsection
