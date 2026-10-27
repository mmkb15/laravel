<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    {{-- তোমার admin.layouts.master যেই CSS files link করে, সেগুলো এখানেও link করে দাও।
         যেমন: <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>
<body>
    <div class="login-wrap" style="max-width:420px;margin:80px auto;">
        <div class="login-content wg-box">
            <h3 class="mb-30">Login</h3>

            @if ($errors->any())
                <div class="alert alert-danger mb-14">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mb-14">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Email <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group mb-14">
                    <label class="body-title mb-10">Password <span class="tf-color-1">*</span></label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="form-group mb-20 flex items-center gap10">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="body-text">Remember me</label>
                </div>
                <button type="submit" class="tf-button w-full">Login</button>
            </form>

            <p class="mt-14 body-text">Don't have an account? <a class="tf-color" href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>
</html>