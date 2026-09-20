<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Mursalin eCommerce')</title>
<link rel="stylesheet" href="{ asset('admin/css/animate.min.css') }">
<link rel="stylesheet" href="{ asset('admin/css/animation.css') }">
<link rel="stylesheet" href="{ asset('admin/css/bootstrap.css') }">
<link rel="stylesheet" href="{ asset('admin/css/bootstrap-select.min.css') }">
<link rel="stylesheet" href="{ asset('admin/css/style.css') }">
<link rel="stylesheet" href="{ asset('admin/font/fonts.css') }">
<link rel="stylesheet" href="{ asset('admin/icon/style.css') }">
<style>.flash-wrap{position:fixed;right:25px;top:80px;z-index:9999;min-width:320px} .admin-thumb{width:55px;height:55px;object-fit:cover;border-radius:6px}</style>
@stack('styles')
</head>
<body class="body">
<div id="wrapper"><div id="page"><div class="layout-wrap">
<div id="preload" class="preload-container"><div class="preloading"><span></span></div></div>
<div class="section-menu-left">
<div class="box-logo">
<a href="{{ route('admin.dashboard') }}" id="site-logo-inner">
<img alt="" class="" data-dark="images/logo/logo-dark.png" data-light="images/logo/logo.png" id="logo_header" src="images/logo/logo.png"/>
</a>
<div class="button-show-hide">
<i class="icon-menu-left"></i>
</div>
</div>

<div class="section-menu-left-wrap">
<div class="center">
<div class="center-item">
<div class="center-heading">Main Home</div>
<ul class="menu-list">
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.dashboard') }}"><div class="icon"><i class="icon-grid"></i></div><div class="text">Dashboard</div></a></li>
</ul>
</div>
<div class="center-item">
<div class="center-heading">Catalog</div>
<ul class="menu-list">
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.categories.index') }}"><div class="icon"><i class="icon-list"></i></div><div class="text">Categories</div></a></li>
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.brands.index') }}"><div class="icon"><i class="icon-tag"></i></div><div class="text">Brands</div></a></li>
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.products.index') }}"><div class="icon"><i class="icon-shopping-bag"></i></div><div class="text">Products</div></a></li>
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.attributes.index') }}"><div class="icon"><i class="icon-settings"></i></div><div class="text">Attributes</div></a></li>
</ul></div>
<div class="center-item">
<div class="center-heading">Sales</div>
<ul class="menu-list">
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.orders.index') }}"><div class="icon"><i class="icon-file-text"></i></div><div class="text">Orders</div></a></li>
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.coupons.index') }}"><div class="icon"><i class="icon-percent"></i></div><div class="text">Coupons</div></a></li>
</ul></div>
<div class="center-item">
<div class="center-heading">Customers</div>
<ul class="menu-list">
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.users.index') }}"><div class="icon"><i class="icon-user"></i></div><div class="text">Customers</div></a></li>
<li class="menu-item"><a class="menu-item-button" href="{{ route('admin.reviews.index') }}"><div class="icon"><i class="icon-star"></i></div><div class="text">Reviews</div></a></li>
</ul></div>
</div></div>

</div>
<div class="section-content-right">
<div class="header-dashboard">
<div class="wrap">
<div class="header-left">
<a href="{{ route('admin.dashboard') }}">
<img alt="" class="" data-dark="images/logo/logo-dark.png" data-height="52px" data-light="images/logo/logo.png" data-retina="images/logo/logo@2x.png" data-width="154px" id="logo_header_mobile" src="images/logo/logo.png"/>
</a>
<div class="button-show-hide">
<i class="icon-menu-left"></i>
</div>
<form class="form-search flex-grow">
<fieldset class="name">
<input aria-required="true" class="show-search" name="name" placeholder="Search here..." required="" tabindex="2" type="text" value=""/>
</fieldset>
<div class="button-submit">
<button class="" type="submit"><i class="icon-search"></i></button>
</div>
<div class="box-content-search" id="box-content-search">
<ul class="mb-24">
<li class="mb-14">
<div class="body-title">Top selling product</div>
</li>
<li class="mb-14">
<div class="divider"></div>
</li>
<li>
<ul>
<li class="product-item gap14 mb-10">
<div class="image no-bg">
<img alt="" src="images/products/17.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Dog Food Rachael Ray Nutrish®</a>
</div>
</div>
</li>
<li class="mb-10">
<div class="divider"></div>
</li>
<li class="product-item gap14 mb-10">
<div class="image no-bg">
<img alt="" src="images/products/18.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Natural Dog Food Healthy Dog Food</a>
</div>
</div>
</li>
<li class="mb-10">
<div class="divider"></div>
</li>
<li class="product-item gap14">
<div class="image no-bg">
<img alt="" src="images/products/19.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Freshpet Healthy Dog Food and Cat</a>
</div>
</div>
</li>
</ul>
</li>
</ul>
<ul class="">
<li class="mb-14">
<div class="body-title">Order product</div>
</li>
<li class="mb-14">
<div class="divider"></div>
</li>
<li>
<ul>
<li class="product-item gap14 mb-10">
<div class="image no-bg">
<img alt="" src="images/products/20.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Sojos Crunchy Natural Grain Free...</a>
</div>
</div>
</li>
<li class="mb-10">
<div class="divider"></div>
</li>
<li class="product-item gap14 mb-10">
<div class="image no-bg">
<img alt="" src="images/products/21.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Kristin Watson</a>
</div>
</div>
</li>
<li class="mb-10">
<div class="divider"></div>
</li>
<li class="product-item gap14 mb-10">
<div class="image no-bg">
<img alt="" src="images/products/22.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Mega Pumpkin Bone</a>
</div>
</div>
</li>
<li class="mb-10">
<div class="divider"></div>
</li>
<li class="product-item gap14">
<div class="image no-bg">
<img alt="" src="images/products/23.png"/>
</div>
<div class="flex items-center justify-between gap20 flex-grow">
<div class="name">
<a class="body-text" href="#">Mega Pumpkin Bone</a>
</div>
</div>
</li>
</ul>
</li>
</ul>
</div>
</form>
</div>
<div class="header-grid">
<div class="header-item country">
<select class="image-select no-text">
<option data-thumbnail="images/country/1.png">ENG</option>
<option data-thumbnail="images/country/9.png">VIE</option>
</select>
</div>
<div class="header-item button-dark-light">
<i class="icon-moon"></i>
</div>
<div class="popup-wrap noti type-header">
<div class="dropdown">
<button aria-expanded="false" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton1" type="button">
<span class="header-item">
<span class="text-tiny">1</span>
<i class="icon-bell"></i>
</span>
</button>
<ul aria-labelledby="dropdownMenuButton1" class="dropdown-menu dropdown-menu-end has-content">
<li>
<h6>Message</h6>
</li>
<li>
<div class="noti-item w-full wg-user active">
<div class="image">
<img alt="" src="images/avatar/user-11.png"/>
</div>
<div class="flex-grow">
<div class="flex items-center justify-between">
<a class="body-title" href="#">Cameron Williamson</a>
<div class="time">10:13 PM</div>
</div>
<div class="text-tiny">Hello?</div>
</div>
</div>
</li>
<li>
<div class="noti-item w-full wg-user active">
<div class="image">
<img alt="" src="images/avatar/user-12.png"/>
</div>
<div class="flex-grow">
<div class="flex items-center justify-between">
<a class="body-title" href="#">Ralph Edwards</a>
<div class="time">10:13 PM</div>
</div>
<div class="text-tiny">Are you there?  interested i this...</div>
</div>
</div>
</li>
<li>
<div class="noti-item w-full wg-user active">
<div class="image">
<img alt="" src="images/avatar/user-13.png"/>
</div>
<div class="flex-grow">
<div class="flex items-center justify-between">
<a class="body-title" href="#">Eleanor Pena</a>
<div class="time">10:13 PM</div>
</div>
<div class="text-tiny">Interested in this loads?</div>
</div>
</div>
</li>
<li>
<div class="noti-item w-full wg-user active">
<div class="image">
<img alt="" src="images/avatar/user-11.png"/>
</div>
<div class="flex-grow">
<div class="flex items-center justify-between">
<a class="body-title" href="#">Jane Cooper</a>
<div class="time">10:13 PM</div>
</div>
<div class="text-tiny">Okay...Do we have a deal?</div>
</div>
</div>
</li>
<li><a class="tf-button w-full" href="#">View all</a></li>
</ul>
</div>
</div>
<div class="popup-wrap message type-header">
<div class="dropdown">
<button aria-expanded="false" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton2" type="button">
<span class="header-item">
<span class="text-tiny">1</span>
<i class="icon-message-square"></i>
</span>
</button>
<ul aria-labelledby="dropdownMenuButton2" class="dropdown-menu dropdown-menu-end has-content">
<li>
<h6>Notifications</h6>
</li>
<li>
<div class="message-item item-1">
<div class="image">
<i class="icon-noti-1"></i>
</div>
<div>
<div class="body-title-2">Discount available</div>
<div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
</div>
</div>
</li>
<li>
<div class="message-item item-2">
<div class="image">
<i class="icon-noti-2"></i>
</div>
<div>
<div class="body-title-2">Account has been verified</div>
<div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus et</div>
</div>
</div>
</li>
<li>
<div class="message-item item-3">
<div class="image">
<i class="icon-noti-3"></i>
</div>
<div>
<div class="body-title-2">Order shipped successfully</div>
<div class="text-tiny">Integer aliquam eros nec sollicitudin sollicitudin</div>
</div>
</div>
</li>
<li>
<div class="message-item item-4">
<div class="image">
<i class="icon-noti-4"></i>
</div>
<div>
<div class="body-title-2">Order pending: <span>ID 305830</span></div>
<div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
</div>
</div>
</li>
<li><a class="tf-button w-full" href="#">View all</a></li>
</ul>
</div>
</div>
<div class="header-item button-zoom-maximize">
<div class="">
<i class="icon-maximize"></i>
</div>
</div>
<div class="popup-wrap apps type-header">
<div class="dropdown">
<button aria-expanded="false" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton4" type="button">
<span class="header-item">
<i class="icon-grid"></i>
</span>
</button>
<ul aria-labelledby="dropdownMenuButton4" class="dropdown-menu dropdown-menu-end has-content">
<li>
<h6>Related apps</h6>
</li>
<li>
<ul class="list-apps">
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-1.png"/>
</div>
<a href="#">
<div class="text-tiny">Photoshop</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-2.png"/>
</div>
<a href="#">
<div class="text-tiny">illustrator</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-3.png"/>
</div>
<a href="#">
<div class="text-tiny">Sheets</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-4.png"/>
</div>
<a href="#">
<div class="text-tiny">Gmail</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-5.png"/>
</div>
<a href="#">
<div class="text-tiny">Messenger</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-6.png"/>
</div>
<a href="#">
<div class="text-tiny">Youtube</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-7.png"/>
</div>
<a href="#">
<div class="text-tiny">Flaticon</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-8.png"/>
</div>
<a href="#">
<div class="text-tiny">Instagram</div>
</a>
</li>
<li class="item">
<div class="image">
<img alt="" src="images/apps/item-9.png"/>
</div>
<a href="#">
<div class="text-tiny">PDF</div>
</a>
</li>
</ul>
</li>
<li><a class="tf-button w-full" href="#">View all app</a></li>
</ul>
</div>
</div>
<div class="popup-wrap user type-header">
<div class="dropdown">
<button aria-expanded="false" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton3" type="button">
<span class="header-user wg-user">
<span class="image">
<img alt="" src="images/avatar/user-1.png"/>
</span>
<span class="flex flex-column">
<span class="body-title mb-2">Kristin Watson</span>
<span class="text-tiny">Admin</span>
</span>
</span>
</button>
<ul aria-labelledby="dropdownMenuButton3" class="dropdown-menu dropdown-menu-end has-content">
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-user"></i>
</div>
<div class="body-title-2">Account</div>
</a>
</li>
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-mail"></i>
</div>
<div class="body-title-2">Inbox</div>
<div class="number">27</div>
</a>
</li>
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-file-text"></i>
</div>
<div class="body-title-2">Taskboard</div>
</a>
</li>
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-settings"></i>
</div>
<div class="body-title-2">Setting</div>
</a>
</li>
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-headphones"></i>
</div>
<div class="body-title-2">Support</div>
</a>
</li>
<li>
<a class="user-item" href="#">
<div class="icon">
<i class="icon-log-out"></i>
</div>
<div class="body-title-2">Log out</div>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="main-content"><div class="main-content-inner">
<div class="flash-wrap">
@if(session('success'))<div class="alert alert-success alert-dismissible fade show">{ session('success') }<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if(session('error'))<div class="alert alert-danger alert-dismissible fade show">{ session('error') }<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
@if($errors->any())<div class="alert alert-danger alert-dismissible fade show"><ul class="mb-0">@foreach($errors->all() as $error)<li>{ $error }</li>@endforeach</ul><button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
</div>
@yield('content')
</div>
<div class="bottom-page"><div class="container-fluid"><div class="row"><div class="col-12"><div class="body-text text-center py-3">© { date('Y') } Mursalin eCommerce</div></div></div></div></div>
</div></div></div></div></div>
<script src="{ asset('admin/js/jquery.min.js') }"></script>
<script src="{ asset('admin/js/bootstrap.min.js') }"></script>
<script src="{ asset('admin/js/bootstrap-select.min.js') }"></script>
<script src="{ asset('admin/js/main.js') }"></script>
@stack('scripts')
<script>setTimeout(()=>document.querySelectorAll('.alert').forEach(a=>{try{bootstrap.Alert.getOrCreateInstance(a).close()}catch(e){}}),4500);</script>
</body></html>