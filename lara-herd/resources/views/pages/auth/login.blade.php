@extends('layouts.singlePage')


{{-- title --}}
@section('title', 'Login')

{{-- Link --}}
@section('link')
    <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">
@endsection

{{-- Style --}}
@section('style')
    <style>
    </style>
@endsection

{{-- HeadScript --}}
@section('headScript')
@endsection

{{-- Content --}}
@section('singlePage')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <div class="d-grid gap-2 mb-3">
                            <a href="#" class="btn btn-social btn-google">
                                <i class="bi bi-google me-2"></i> Sign in with Google
                            </a>
                            <a href="#" class="btn btn-social btn-facebook">
                                <i class="bi bi-facebook me-2"></i> Sign in with Facebook
                            </a>
                            <a href="#" class="btn btn-social btn-twitter">
                                <i class="bi bi-twitter me-2"></i> Sign in with Twitter
                            </a>
                        </div>
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Script --}}
@section('script')
    <script></script>
@endsection
