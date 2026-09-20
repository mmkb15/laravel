<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Mursalin Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f8fa
        }

        .product-card img {
            height: 230px;
            object-fit: cover
        }

        .hero {
            background: #111827;
            color: white;
            border-radius: 20px
        }

        .price {
            font-weight: 700;
            font-size: 1.2rem
        }

        .navbar-brand {
            font-weight: 800
        }

        .flash {
            position: fixed;
            right: 20px;
            top: 75px;
            z-index: 999
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container"><a class="navbar-brand" href="{{ route('home') }}">Mursalin</a><button
                class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">☰</button>
            <div id="nav" class="collapse navbar-collapse">
                <form class="d-flex mx-auto" action="{{ route('products') }}"><input class="form-control me-2"
                        name="q" placeholder="Search products"><button class="btn btn-dark">Search</button></form>
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart</a></li>@auth<li
                            class="nav-item"><a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                        @if (auth()->user()->isAdmin())
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a></li>
                        @endif
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">@csrf<button
                                    class="btn btn-link nav-link">Logout</button></form>
                    </li>@else<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-dark ms-2" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @if (session('success') || session('error') || $errors->any())
        <div class="flash">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $e)
                        <div>{{ $e }}</div>
                    @endforeach
                </div>
            @endif

        </div>
    @endif
    <main class="container py-4">@yield('content')</main>
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">© {{ date('Y') }} Mursalin eCommerce. Single-vendor store.</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>@stack('scripts')
</body>

</html>
