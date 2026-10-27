@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Dashboard</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><div class="text-tiny">Home</div></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Dashboard</div></li>
            </ul>
        </div>
    </div>

    <div class="tf-section-4 mb-30">
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div class="dash-icon-box" style="width:52px;height:52px;border-radius:12px;background:#3b82f6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-shopping-cart" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Total Products</div>
                    <h4>{{ number_format($productCount) }}</h4>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div class="dash-icon-box" style="width:52px;height:52px;border-radius:12px;background:#8b5cf6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-layers" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Categories</div>
                    <h4>{{ number_format($categoryCount) }}</h4>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div class="dash-icon-box" style="width:52px;height:52px;border-radius:12px;background:#f59e0b;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-file" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Orders</div>
                    <h4>{{ number_format($orderCount) }}</h4>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div class="dash-icon-box" style="width:52px;height:52px;border-radius:12px;background:#10b981;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-users" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Customers</div>
                    <h4>{{ number_format($customerCount) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="tf-section-2 mb-30">
        <div class="wg-box">
            <div class="flex items-center justify-between mb-20"><h5>Recent Orders</h5><a class="view-all" href="{{ route('orders.index') }}">View all <i class="icon-chevron-right"></i></a></div>
            <div class="ecom-table-wrap">
                <div class="ecom-table ecom-dashboard-order-table">
                    <div class="ecom-table-head"><div class="cell">Order</div><div class="cell">Customer</div><div class="cell">Total</div><div class="cell">Status</div></div>
                    @forelse($recentOrders as $order)
                        <div class="ecom-table-row">
                            <div class="cell"><a class="ecom-primary" href="{{ route('orders.show',$order) }}">{{ $order->order_number }}</a><div class="ecom-muted">{{ $order->created_at->format('d M Y') }}</div></div>
                            <div class="cell"><div class="ecom-user-cell"><div class="ecom-thumb user"><img src="{{ $order->user?->image_url ?? asset('assets/images/avatar/user-1.png') }}" alt=""></div><div class="ecom-primary text-truncate">{{ $order->user?->name ?? $order->shipping_name }}</div></div></div>
                            <div class="cell"><span class="ecom-money">${{ number_format($order->total,2) }}</span></div>
                            <div class="cell"><span class="ecom-status {{ $order->status }}">{{ ucfirst($order->status) }}</span></div>
                        </div>
                    @empty
                        <div class="ecom-empty">No orders yet.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between mb-20"><h5>Low Stock Products</h5><a class="view-all" href="{{ route('products.index') }}">View all <i class="icon-chevron-right"></i></a></div>
            <div class="wg-table table-top-product">
                @forelse($lowStockProducts as $product)
                    <div class="product-item gap14 mb-14">
                        <div class="image"><img src="{{ $product->image_url }}" alt="{{ $product->name }}"></div>
                        <div class="flex items-center justify-between flex-grow">
                            <div><div class="body-title-2">{{ $product->name }}</div><div class="text-tiny mt-3">SKU: {{ $product->sku }}</div></div>
                            <div class="body-title-2">{{ number_format($product->stock) }} left</div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No low stock products.</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="tf-section-4">
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div style="width:52px;height:52px;border-radius:12px;background:#3b82f6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-trending-up" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Total Sales</div>
                    <h4>${{ number_format($salesTotal,2) }}</h4>
                    <div class="text-tiny mt-2">Processing, shipped and delivered orders</div>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div style="width:52px;height:52px;border-radius:12px;background:#8b5cf6;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-box" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Brands</div>
                    <h4>{{ number_format($brandCount) }}</h4>
                    <div class="text-tiny mt-2">Active catalog brands</div>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div style="width:52px;height:52px;border-radius:12px;background:#ef4444;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-alert-triangle" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Low Stock</div>
                    <h4>{{ $lowStockProducts->count() }}</h4>
                    <div class="text-tiny mt-2">Products with 5 or fewer units</div>
                </div>
            </div>
        </div>
        <div class="wg-chart-default">
            <div class="flex items-center gap14">
                <div style="width:52px;height:52px;border-radius:12px;background:#10b981;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="icon-zap" style="font-size:22px;color:#fff;"></i>
                </div>
                <div>
                    <div class="body-text mb-2">Quick Actions</div>
                    <div class="flex gap10 flex-wrap mt-10">
                        <a class="tf-button style-1" href="{{ route('products.create') }}">Add Product</a>
                        <a class="tf-button style-2" href="{{ route('orders.create') }}">Create Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
.ecom-dashboard-order-table { min-width: 640px; }
.ecom-dashboard-order-table .ecom-table-head,
.ecom-dashboard-order-table .ecom-table-row { grid-template-columns: minmax(160px,1fr) minmax(190px,1.2fr) 100px 110px; }
</style>
@endsection
