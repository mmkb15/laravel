@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="main-content-wrap">
<div class="tf-section-4 mb-30">
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-shopping-bag"></i></div><div><div class="body-text mb-2">Products</div><h4>{{ $productCount }}</h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-layers"></i></div><div><div class="body-text mb-2">Categories</div><h4>{{ $categoryCount }}</h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-file"></i></div><div><div class="body-text mb-2">Orders</div><h4>{{ $orderCount }}</h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-dollar-sign"></i></div><div><div class="body-text mb-2">Sales</div><h4>৳{{ number_format($salesTotal,2) }}</h4></div></div></div>
</div>
<div class="wg-box"><div class="flex items-center justify-between mb-20"><h5>Recent Orders</h5><a href="{{ route('orders.index') }}" class="view-all">View all</a></div>
<div class="wg-table"><ul class="table-title flex gap20 mb-14"><li><div class="body-title">Order</div></li><li><div class="body-title">Customer</div></li><li><div class="body-title">Total</div></li><li><div class="body-title">Status</div></li></ul>
@forelse($recentOrders as $order)<li class="product-item"><div class="flex items-center justify-between flex-grow"><div class="body-title-2">{{ $order->order_number }}</div><div class="body-text">{{ $order->customer_name }}</div><div class="body-text">৳{{ number_format($order->total_amount,2) }}</div><div class="body-text">{{ $order->status }}</div></div></li>@empty<li class="product-item"><div class="body-text">No orders yet.</div></li>@endforelse
</div></div>
</div>
@endsection
