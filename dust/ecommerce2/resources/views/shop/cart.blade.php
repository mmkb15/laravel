@extends('shop.layout')
@section('title','Cart')
@section('content')
<div class="container-shop"><h2 class="mb-4">Your Cart</h2>@if(!$cart)<div class="alert alert-info">Your cart is empty. <a href="{{route('shop.index')}}">Continue shopping</a>.</div>@else
<form method="POST" action="{{route('cart.update')}}">@csrf<div class="table-responsive"><table class="table bg-white"><thead><tr><th>Product</th><th>SKU</th><th>Price</th><th width="130">Qty</th><th>Total</th><th></th></tr></thead><tbody>@php($subtotal=0)
@foreach($cart as $key=>$item) @php($line=$item['price']*$item['quantity']) @php($subtotal+=$line)
<tr><td>{{$item['name']}}</td><td>{{$item['sku_code']}}</td><td>৳{{number_format($item['price'],2)}}</td><td><input class="form-control" type="number" min="1" name="quantity[{{$key}}]" value="{{$item['quantity']}}"></td><td>৳{{number_format($line,2)}}</td><td><a class="text-danger" href="{{route('cart.remove',$key)}}">Remove</a></td></tr>@endforeach
</tbody></table></div><div class="d-flex justify-content-between align-items-center"><button class="btn-shop" type="submit">Update Cart</button><div class="h5">Subtotal: ৳{{number_format($subtotal,2)}} <a class="btn-shop ms-3 text-decoration-none" href="{{route('checkout.create')}}">Checkout</a></div></div></form>@endif</div>
@endsection
