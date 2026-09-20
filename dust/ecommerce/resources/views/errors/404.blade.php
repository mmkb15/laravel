@extends('admin.layouts.single')

@section('title', '404 - Page Not Found')

@section('style')
<style>
    .box-404 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 16px;
        text-align: center;
        padding: 60px 30px;
    }

    .box-404 .num-404 {
        font-size: 120px;
        font-weight: 800;
        line-height: 1;
        color: var(--Main);
        letter-spacing: -4px;
    }

    .box-404 .num-404 span {
        color: var(--Style);
    }

    .box-404 h3 {
        font-size: 24px;
        font-weight: 700;
        color: var(--Heading);
        margin: 0;
    }

    .box-404 .body-text {
        color: var(--Body-Text);
        max-width: 360px;
    }

    .box-404 .btn-group-404 {
        display: flex;
        gap: 12px;
        margin-top: 8px;
        flex-wrap: wrap;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="wrap-login-page">
    <div class="flex-grow flex flex-column justify-center gap30">

        <a href="{{ route('dashboard') }}" id="site-logo-inner"></a>

        <div class="login-box">
            <div class="box-404">

                {{-- SVG Illustration --}}
                <svg width="220" height="160" viewBox="0 0 220 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="110" cy="140" rx="90" ry="12" fill="#ECF0F4"/>
                    <!-- document -->
                    <rect x="60" y="20" width="100" height="120" rx="10" fill="white" stroke="#E2E8F0" stroke-width="2"/>
                    <rect x="75" y="38" width="70" height="7" rx="3.5" fill="#E2E8F0"/>
                    <rect x="75" y="53" width="55" height="7" rx="3.5" fill="#E2E8F0"/>
                    <rect x="75" y="68" width="65" height="7" rx="3.5" fill="#E2E8F0"/>
                    <rect x="75" y="83" width="45" height="7" rx="3.5" fill="#E2E8F0"/>
                    <!-- X circle -->
                    <circle cx="110" cy="110" r="24" fill="#FFF1EE"/>
                    <line x1="100" y1="100" x2="120" y2="120" stroke="#FF5200" stroke-width="3.5" stroke-linecap="round"/>
                    <line x1="120" y1="100" x2="100" y2="120" stroke="#FF5200" stroke-width="3.5" stroke-linecap="round"/>
                    <!-- magnifier -->
                    <circle cx="168" cy="38" r="20" fill="white" stroke="#2275fc" stroke-width="3"/>
                    <line x1="182" y1="52" x2="196" y2="66" stroke="#2275fc" stroke-width="4" stroke-linecap="round"/>
                    <circle cx="165" cy="35" r="5" fill="#BFDBFE"/>
                </svg>

                {{-- 404 --}}
                <div class="num-404">4<span>0</span>4</div>

                {{-- Message --}}
                <h3>Oops! Page not found</h3>
                <div class="body-text">
                    The page you are looking for doesn't exist or has been moved. Please go back or visit the dashboard.
                </div>

                {{-- Buttons --}}
                <div class="btn-group-404">
                    <a href="{{ route('dashboard') }}" class="tf-button">Go to Dashboard</a>
                    <a href="javascript:history.back()" class="tf-button style-2">Go Back</a>
                </div>

            </div>
        </div>
    </div>

    <div class="text-tiny">Copyright &copy; {{ date('Y') }} Remos, All rights reserved.</div>
</div>
@endsection