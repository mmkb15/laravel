@extends('admin.layouts.master')
@section('title','Order Details')
@section('content')
<div class="main-content-wrap">
@include('admin.partials.alerts')
<div class="wg-box mb-20"><div class="flex items-center justify-between"><div><h5>{{ $order->order_number }}</h5><div class="text-tiny">{{ $order->order_date?->format('d M Y h:i A') }}</div></div>
<form action="{{ route('orders.status',$order) }}" method="POST" class="flex gap10">@csrf @method('PATCH')<div class="select"><select name="status">@foreach(['Pending','Processing','Shipped','Delivered','Cancelled'] as $status)<option value="{{ $status }}" @selected($order->status===$status)>{{ $status }}</option>@endforeach</select></div><button class="tf-button" type="submit">Update</button></form></div></div>
<div class="tf-section-2">
<div class="wg-box"><h5 class="mb-20">Customer</h5><div class="body-text">{{ $order->customer_name }}</div><div class="body-text">{{ $order->phone }}</div><div class="body-text">{{ $order->email }}</div><div class="body-text mt-10">{{ $order->shipping_address }}</div></div>
<div class="wg-box"><h5 class="mb-20">Summary</h5><div class="flex justify-between mb-10"><span>Subtotal</span><strong>৳{{ number_format($order->subtotal,2) }}</strong></div><div class="flex justify-between mb-10"><span>Discount</span><strong>৳{{ number_format($order->discount_amount,2) }}</strong></div><div class="flex justify-between"><span>Total</span><strong>৳{{ number_format($order->total_amount,2) }}</strong></div></div>
</div>
<div class="wg-box mt-20"><h5 class="mb-20">Items</h5><div class="wg-table"><ul class="table-title flex gap20 mb-14"><li><div class="body-title">Product</div></li><li><div class="body-title">SKU</div></li><li><div class="body-title">Qty</div></li><li><div class="body-title">Price</div></li><li><div class="body-title">Total</div></li></ul>
@foreach($order->items as $item)<li class="product-item"><div class="flex items-center justify-between flex-grow"><div class="body-text">{{ $item->sku?->product?->name }}</div><div class="body-text">{{ $item->sku?->sku_code }}</div><div class="body-text">{{ $item->quantity }}</div><div class="body-text">৳{{ number_format($item->price,2) }}</div><div class="body-text">৳{{ number_format($item->price*$item->quantity,2) }}</div></div></li>@endforeach
</div></div></div>
@endsection
