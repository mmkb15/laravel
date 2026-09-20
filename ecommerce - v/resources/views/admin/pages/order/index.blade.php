@extends('admin.layouts.master')

@section('title', 'Orders')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Order List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Orders</div></li>
            </ul>
        </div>
        <a class="tf-button" href="{{ route('orders.create') }}"><i class="icon-plus"></i>Create Order</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('orders.index') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search order or customer...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-filter">
                <form method="GET" action="{{ route('orders.index') }}" class="ecom-filter">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <div class="template-select">
                        <select name="status" onchange="this.form.submit()">
                            <option value="">All Statuses</option>
                            @foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
                                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <span class="ecom-search-count">{{ $orders->total() }} order(s)</span>
            </div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-order-table">
                <div class="ecom-table-head">
                    <div class="cell">Order</div>
                    <div class="cell">Customer</div>
                    <div class="cell">Item</div>
                    <div class="cell">Total</div>
                    <div class="cell">Payment</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>
                @forelse($orders as $order)
                    @php($firstItem = $order->items->first())
                    <div class="ecom-table-row">
                        <div class="cell">
                            <a href="{{ route('orders.show', $order) }}" class="ecom-primary">{{ $order->order_number }}</a>
                            <div class="ecom-muted">{{ $order->created_at->format('d M Y, h:i A') }}</div>
                        </div>
                        <div class="cell">
                            <div class="ecom-user-cell">
                                <div class="ecom-thumb user"><img src="{{ $order->user?->image_url ?? asset('assets/images/avatar/user-1.png') }}" alt="{{ $order->user?->name ?? $order->shipping_name }}"></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate">{{ $order->user?->name ?? $order->shipping_name }}</div>
                                    <div class="ecom-muted">{{ $order->shipping_phone }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            @if($firstItem)
                                <div class="ecom-product-cell">
                                    <div class="ecom-thumb"><img src="{{ $firstItem->product?->image_url ?? asset('assets/images/products/1.png') }}" alt="{{ $firstItem->product_name }}"></div>
                                    <div class="min-w-0">
                                        <div class="ecom-primary text-truncate">{{ $firstItem->product_name }}</div>
                                        <div class="ecom-muted">Qty: {{ $firstItem->quantity }}{{ $order->items->count() > 1 ? ' · +'.($order->items->count()-1).' more' : '' }}</div>
                                    </div>
                                </div>
                            @else
                                <span>—</span>
                            @endif
                        </div>
                        <div class="cell"><span class="ecom-money">${{ number_format($order->total, 2) }}</span></div>
                        <div class="cell"><span class="body-text">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Bank Transfer' }}</span></div>
                        <div class="cell"><span class="ecom-status {{ $order->status }}">{{ ucfirst($order->status) }}</span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('orders.show', $order) }}" class="item eye" title="View order"><i class="icon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No orders found.</div>
                @endforelse
            </div>
        </div>
        <div class="ecom-pagination">{{ $orders->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection
