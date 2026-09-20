@extends('admin.layouts.master')

@section('title', 'Order Details')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Order {{ $order->order_number }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('orders.index') }}"><div class="text-tiny">Orders</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Order Details</div></li>
            </ul>
        </div>
        <a class="tf-button style-2" href="{{ route('orders.index') }}"><i class="icon-arrow-left"></i>Back to Orders</a>
    </div>

    <div class="ecom-detail-grid">
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Order Items</h5></div>
            @forelse($order->items as $item)
                <div class="ecom-order-item">
                    <div class="ecom-thumb"><img src="{{ $item->product?->image_url ?? asset('assets/images/products/1.png') }}" alt="{{ $item->product_name }}"></div>
                    <div class="min-w-0">
                        <div class="ecom-primary text-truncate">{{ $item->product_name }}</div>
                        <div class="ecom-muted">Qty {{ $item->quantity }} × ${{ number_format($item->unit_price,2) }}</div>
                    </div>
                    <div class="ecom-money">${{ number_format($item->subtotal,2) }}</div>
                </div>
            @empty
                <div class="ecom-empty">No order items found.</div>
            @endforelse

            <div class="summary-total">
                <div class="total-row"><span class="body-text">Subtotal</span><strong>${{ number_format($order->subtotal,2) }}</strong></div>
                <div class="total-row"><span class="body-text">Shipping</span><strong>${{ number_format($order->shipping_cost,2) }}</strong></div>
                <div class="total-row"><span class="body-text">Discount</span><strong>-${{ number_format($order->discount,2) }}</strong></div>
                <div class="total-row"><span class="body-title-2">Order Total</span><strong class="body-title-2">${{ number_format($order->total,2) }}</strong></div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Order Summary</h5></div>
            <div class="detail-list">
                <div class="detail-row"><div class="detail-label">Customer</div><div class="detail-value">{{ $order->user?->name ?? $order->shipping_name }}</div></div>
                <div class="detail-row"><div class="detail-label">Email</div><div class="detail-value">{{ $order->user?->email ?? 'Guest customer' }}</div></div>
                <div class="detail-row"><div class="detail-label">Phone</div><div class="detail-value">{{ $order->shipping_phone }}</div></div>
                <div class="detail-row"><div class="detail-label">Address</div><div class="detail-value">{{ $order->shipping_address }}</div></div>
                <div class="detail-row"><div class="detail-label">Payment</div><div class="detail-value">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Bank Transfer' }} · {{ ucfirst($order->payment_status) }}</div></div>
                <div class="detail-row"><div class="detail-label">Created</div><div class="detail-value">{{ $order->created_at->format('d M Y, h:i A') }}</div></div>
            </div>

            <div class="template-field">
                <label for="status">Order Status</label>
                <form method="POST" action="{{ route('orders.status',$order) }}">
                    @csrf @method('PATCH')
                    <div class="template-select">
                        <select id="status" name="status">
                            @foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
                                <option value="{{ $status }}" @selected($order->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="tf-button w-full mt-15" type="submit"><i class="icon-refresh-cw"></i>Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
