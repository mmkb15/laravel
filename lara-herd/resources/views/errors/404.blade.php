@extends('layouts.singlePage')

{{-- title --}}
@section('title', '404 Not Found')

{{-- Style --}}
@section('style')
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .error-content {
            text-align: center;
        }

        .error-content h1 {
            font-size: 6rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .error-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .lottie-animation {
            max-width: 400px;
            margin-bottom: 2rem;
        }
    </style>
@endsection

{{-- HeaderScript --}}
@section('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
@endsection

{{-- Content --}}
@section('singlePage')
    <div class="error-container">
        <div class="lottie-animation"></div>
        <div class="error-content">
            <h1>Error!</h1>
            <p>Oops! Product Not Found :(</p>
            <x-btn href="/" class="btn-dark">
                Back to Home Page
            </x-btn>
        </div>
    </div>
@endsection

{{-- Script --}}
@section('script')
    <script>
        const animation = lottie.loadAnimation({
            container: document.querySelector('.lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'
        });
    </script>
@endsection
