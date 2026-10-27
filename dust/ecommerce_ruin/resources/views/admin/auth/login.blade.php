{{--
    তোমার Remos template এ login blade view আগে থেকেই আছে (project info অনুযায়ী)।
    এই ফাইলটা শুধু reference হিসেবে দেওয়া হলো — ফর্মের name attribute গুলো
    (email, password, remember) মিলিয়ে নিয়ে তোমার existing login.blade.php তে বসিয়ে দাও।
    action="{{ route('login.post') }}" আর method="POST" ঠিক আছে কিনা চেক করো।
--}}
@extends('admin.layouts.auth')

@section('content')
<div class="login-wrap">
    <div class="login-content">
        <h3 class="mb-30">Login</h3>

        @if ($errors->any())
            <div class="alert alert-danger mb-14">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group mb-14">
                <label class="body-title mb-10">Email <span class="tf-color-1">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
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
@endsection
