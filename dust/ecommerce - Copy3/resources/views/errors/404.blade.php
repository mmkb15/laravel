@extends('admin.layouts.single')
@section('title','404 - Page Not Found')
@section('content')
<div class="wrap-login-page"><div class="flex-grow flex flex-column justify-center gap30"><div class="login-box"><div style="text-align:center;padding:60px 30px"><div style="font-size:120px;font-weight:800;line-height:1;color:#2275fc">4<span style="color:#ff5200">0</span>4</div><h3>Oops! Page not found</h3><div class="body-text" style="max-width:420px;margin:12px auto 20px">The page you are looking for doesn't exist or has been moved.</div><div class="flex justify-center gap10"><a href="{{ auth()->check()?route('dashboard'):route('login') }}" class="tf-button">Go to {{ auth()->check()?'Dashboard':'Login' }}</a><a href="javascript:history.back()" class="tf-button style-2">Go Back</a></div></div></div></div><div class="text-tiny">Copyright © {{ date('Y') }} Mursalin Ecommerce, All rights reserved.</div></div>
@endsection
