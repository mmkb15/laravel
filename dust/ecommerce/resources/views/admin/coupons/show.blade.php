@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Coupon Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('coupons.index') }}">Coupons</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Details</li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="mb-14"><span class="body-title">Code:</span> <span class="body-text">{{ $coupon->code }}</span></div>
            <div class="mb-14"><span class="body-title">Type:</span> <span class="body-text">{{ ucfirst($coupon->type) }}</span></div>
            <div class="mb-14"><span class="body-title">Value:</span> <span class="body-text">{{ $coupon->type === 'percent' ? $coupon->value . '%' : '৳' . $coupon->value }}</span></div>
            <div class="mb-14"><span class="body-title">Min Order:</span> <span class="body-text">{{ $coupon->min_order ?? '-' }}</span></div>
            <div class="mb-14"><span class="body-title">Used:</span> <span class="body-text">{{ $coupon->used_count }}{{ $coupon->max_uses ? '/' . $coupon->max_uses : '' }}</span></div>
            <div class="mb-14"><span class="body-title">Expires:</span> <span class="body-text">{{ $coupon->expires_at ? $coupon->expires_at->format('d M, Y') : 'No expiry' }}</span></div>
            <div class="mb-14">
                <span class="body-title">Status:</span>
                @if ($coupon->status)
                    <span class="block-available">Active</span>
                @else
                    <span class="block-not-available">Inactive</span>
                @endif
            </div>

            <a href="{{ route('coupons.index') }}" class="tf-button style-1 w208 mt-20">Back</a>
        </div>

    </div>
</div>
@endsection
