@extends('shop.layout')
@section('title','Order Placed')
@section('content')
<div class="container-shop"><div class="bg-white p-5 rounded text-center"><h2>Order placed successfully</h2><p class="text-muted">Your order number is</p><h3>{{$order->order_number}}</h3><p>Total: <strong>৳{{number_format($order->total_amount,2)}}</strong></p><a class="btn-shop text-decoration-none" href="{{route('shop.index')}}">Continue Shopping</a><a class="btn btn-outline-secondary ms-2" href="{{route('orders.show',$order)}}">View in Admin</a></div></div>
@endsection
