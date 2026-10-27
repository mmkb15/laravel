@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Review Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Details</li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="mb-14"><span class="body-title">Customer:</span> <span class="body-text">{{ $review->user->name ?? 'N/A' }}</span></div>
            <div class="mb-14"><span class="body-title">Product:</span> <span class="body-text">{{ $review->product->name ?? 'N/A' }}</span></div>
            <div class="mb-14"><span class="body-title">Rating:</span> <span class="body-text">{{ $review->rating }} / 5</span></div>
            <div class="mb-14"><span class="body-title">Comment:</span> <span class="body-text">{{ $review->comment ?? '-' }}</span></div>
            <div class="mb-14"><span class="body-title">Date:</span> <span class="body-text">{{ $review->created_at->format('d M, Y h:i A') }}</span></div>

            <div class="flex gap10 mt-20">
                <a href="{{ route('reviews.index') }}" class="tf-button style-1 w208">Back</a>
                <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="tf-button style-2 w208">Delete Review</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
