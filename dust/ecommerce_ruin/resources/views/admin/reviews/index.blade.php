@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Reviews</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Reviews</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>Review List</h5>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search" method="GET" action="{{ route('reviews.index') }}">
                    <select name="rating" onchange="this.form.submit()">
                        <option value="">All Ratings</option>
                        @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Star</option>
                        @endfor
                    </select>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">Customer</span></li>
                    <li><span class="body-title">Product</span></li>
                    <li><span class="body-title">Rating</span></li>
                    <li><span class="body-title">Comment</span></li>
                    <li><span class="body-title">Date</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($reviews as $review)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $review->user->name ?? 'N/A' }}</div>
                            <div class="body-text">{{ $review->product->name ?? 'N/A' }}</div>
                            <div class="body-text">{{ $review->rating }} / 5</div>
                            <div class="body-text text-tiny">{{ \Illuminate\Support\Str::limit($review->comment, 40) }}</div>
                            <div class="body-text">{{ $review->created_at->format('d M, Y') }}</div>
                            <div class="list-icon-function">
                                <a href="{{ route('reviews.show', $review) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No reviews found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $reviews->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
