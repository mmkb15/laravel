@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Coupons</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Coupons</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>Coupon List</h5>
                <a href="{{ route('coupons.create') }}" class="tf-button">
                    <i class="icon-plus"></i> Add New Coupon
                </a>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search" method="GET" action="{{ route('coupons.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search coupon code...">
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">Code</span></li>
                    <li><span class="body-title">Type</span></li>
                    <li><span class="body-title">Value</span></li>
                    <li><span class="body-title">Used</span></li>
                    <li><span class="body-title">Expires</span></li>
                    <li><span class="body-title">Status</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($coupons as $coupon)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $coupon->code }}</div>
                            <div class="body-text">{{ ucfirst($coupon->type) }}</div>
                            <div class="body-text">{{ $coupon->type === 'percent' ? $coupon->value . '%' : '৳' . $coupon->value }}</div>
                            <div class="body-text">{{ $coupon->used_count }}{{ $coupon->max_uses ? '/' . $coupon->max_uses : '' }}</div>
                            <div class="body-text">{{ $coupon->expires_at ? $coupon->expires_at->format('d M, Y') : 'No expiry' }}</div>
                            <div class="body-text">
                                @if ($coupon->status)
                                    <span class="block-available">Active</span>
                                @else
                                    <span class="block-not-available">Inactive</span>
                                @endif
                            </div>
                            <div class="list-icon-function">
                                <a href="{{ route('coupons.show', $coupon) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('coupons.edit', $coupon) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                                <form action="{{ route('coupons.destroy', $coupon) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this coupon?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No coupons found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $coupons->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
