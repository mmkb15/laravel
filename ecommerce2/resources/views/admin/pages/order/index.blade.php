@extends('admin.layouts.master')
@section('title','Order List')
@section('content')
<div class="main-content-wrap">
@include('admin.partials.alerts')
<div class="wg-box"><div class="flex items-center justify-between mb-20"><h5>Orders</h5><a href="{{ route('shop.index') }}" class="tf-button style-2">Open Store</a></div>
<div class="wg-table"><ul class="table-title flex gap20 mb-14"><li><div class="body-title">Order</div></li><li><div class="body-title">Customer</div></li><li><div class="body-title">Total</div></li><li><div class="body-title">Status</div></li><li><div class="body-title">Action</div></li></ul>
@forelse($orders as $order)<li class="product-item"><div class="flex items-center justify-between flex-grow gap20">
<div><div class="body-title-2">{{ $order->order_number }}</div><div class="text-tiny">{{ $order->order_date?->format('d M Y h:i A') }}</div></div>
<div class="body-text">{{ $order->customer_name }}</div><div class="body-text">৳{{ number_format($order->total_amount,2) }}</div>
<div class="body-text">{{ $order->status }}</div><div class="list-icon-function"><a class="item edit" href="{{ route('orders.show',$order) }}"><i class="icon-eye"></i></a></div>
</div></li>@empty<li class="product-item"><div class="body-text">No orders yet. Place one from the store.</div></li>@endforelse</div>
<div class="mt-20">{{ $orders->links() }}</div></div></div>
@endsection
