<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Mursalin Store')</title>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>body{background:#f6f7fb}.shop-nav{background:#fff;border-bottom:1px solid #eee;padding:18px 0}.shop-card{background:#fff;border:1px solid #eee;border-radius:12px;overflow:hidden;height:100%}.shop-card img{width:100%;height:220px;object-fit:cover}.shop-card-body{padding:18px}.price{font-weight:700;font-size:20px}.container-shop{max-width:1180px;margin:auto;padding:30px 15px}.btn-shop{background:#2277fc;color:#fff;border:0;border-radius:6px;padding:10px 16px}.btn-shop:hover{color:#fff;opacity:.9}</style>
</head><body>
<nav class="shop-nav"><div class="container-shop py-0 d-flex justify-content-between align-items-center"><a href="{{ route('shop.index') }}" class="h4 mb-0 text-decoration-none">Mursalin Store</a><div><a href="{{ route('shop.index') }}" class="me-3 text-decoration-none">Shop</a><a href="{{ route('cart.index') }}" class="text-decoration-none">Cart ({{ count(session('cart',[])) }})</a><a href="{{ route('dashboard') }}" class="ms-3 text-decoration-none">Admin</a></div></div></nav>
@if(session('success')||session('error'))<div class="container-shop py-2">@if(session('success'))<div class="alert alert-success">{{session('success')}}</div>@endif @if(session('error'))<div class="alert alert-danger">{{session('error')}}</div>@endif</div>@endif
@yield('content')
</body></html>