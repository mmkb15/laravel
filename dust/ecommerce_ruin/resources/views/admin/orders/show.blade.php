@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Order #{{ $order->id }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>#{{ $order->id }}</li>
            </ul>
        </div>

        <div class="gap22 cols">
            <div class="wg-box">
                <h5 class="mb-14">Customer Info</h5>
                <div class="mb-10"><span class="body-title">Name:</span> <span class="body-text">{{ $order->user->name ?? 'N/A' }}</span></div>
                <div class="mb-10"><span class="body-title">Email:</span> <span class="body-text">{{ $order->user->email ?? 'N/A' }}</span></div>
            </div>

            <div class="wg-box">
                <h5 class="mb-14">Order Summary</h5>
                <div class="mb-10"><span class="body-title">Subtotal:</span> <span class="body-text">৳{{ number_format($order->subtotal, 2) }}</span></div>
                <div class="mb-10"><span class="body-title">Discount:</span> <span class="body-text">৳{{ number_format($order->discount, 2) }}</span></div>
                <div class="mb-10"><span class="body-title">Total:</span> <span class="body-text">৳{{ number_format($order->total, 2) }}</span></div>
                <div class="mb-10"><span class="body-title">Coupon:</span> <span class="body-text">{{ $order->coupon->code ?? '-' }}</span></div>
                <div class="mb-10"><span class="body-title">Status:</span> <span class="body-text">{{ ucfirst($order->status) }}</span></div>
            </div>
        </div>

        <div class="wg-box mt-20">
            <h5 class="mb-14">Order Items</h5>
            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">Product</span></li>
                    <li><span class="body-title">SKU</span></li>
                    <li><span class="body-title">Qty</span></li>
                    <li><span class="body-title">Price</span></li>
                </ul>
                <ul class="flex flex-column">
                    @foreach ($order->items as $item)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $item->sku->product->name ?? 'N/A' }}</div>
                            <div class="body-text">{{ $item->sku->sku ?? 'N/A' }}</div>
                            <div class="body-text">{{ $item->quantity }}</div>
                            <div class="body-text">৳{{ number_format($item->price, 2) }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        @if ($order->shipment)
        <div class="wg-box mt-20">
            <h5 class="mb-14">Shipment</h5>
            <div class="mb-10"><span class="body-title">Tracking #:</span> <span class="body-text">{{ $order->shipment->tracking_number ?? '-' }}</span></div>
            <div class="mb-10"><span class="body-title">Status:</span> <span class="body-text">{{ ucfirst($order->shipment->status) }}</span></div>
        </div>
        @endif

        @if ($order->payment)
        <div class="wg-box mt-20">
            <h5 class="mb-14">Payment</h5>
            <div class="mb-10"><span class="body-title">Method:</span> <span class="body-text">{{ ucfirst($order->payment->method) }}</span></div>
            <div class="mb-10"><span class="body-title">Status:</span> <span class="body-text">{{ ucfirst($order->payment->status) }}</span></div>
        </div>
        @endif

        <a href="{{ route('orders.index') }}" class="tf-button style-1 w208 mt-20">Back</a>

    </div>
</div>
@endsection
