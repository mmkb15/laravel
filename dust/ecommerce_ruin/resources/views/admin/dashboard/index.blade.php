@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Dashboard</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>Dashboard</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="gap22 cols mb-27">
            <div class="wg-box">
                <div class="body-title-2 mb-10">Total Products</div>
                <h3>{{ $totalProducts }}</h3>
            </div>
            <div class="wg-box">
                <div class="body-title-2 mb-10">Total Orders</div>
                <h3>{{ $totalOrders }}</h3>
            </div>
            <div class="wg-box">
                <div class="body-title-2 mb-10">Total Users</div>
                <h3>{{ $totalUsers }}</h3>
            </div>
            <div class="wg-box">
                <div class="body-title-2 mb-10">Total Revenue</div>
                <h3>৳{{ number_format($totalRevenue, 2) }}</h3>
            </div>
        </div>

        <div class="wg-box">
            <h5 class="mb-14">Recent Orders</h5>
            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">Order #</span></li>
                    <li><span class="body-title">Customer</span></li>
                    <li><span class="body-title">Total</span></li>
                    <li><span class="body-title">Status</span></li>
                    <li><span class="body-title">Date</span></li>
                </ul>
                <ul class="flex flex-column">
                    @forelse ($recentOrders as $order)
                        <li class="product-item gap14">
                            <div class="body-text">#{{ $order->id }}</div>
                            <div class="body-text">{{ $order->user->name ?? 'N/A' }}</div>
                            <div class="body-text">৳{{ number_format($order->total, 2) }}</div>
                            <div class="body-text">{{ ucfirst($order->status) }}</div>
                            <div class="body-text">{{ $order->created_at->format('d M, Y') }}</div>
                        </li>
                    @empty
                        <li class="body-text">No orders yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
