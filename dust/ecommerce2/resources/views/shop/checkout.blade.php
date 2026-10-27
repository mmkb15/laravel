@extends('shop.layout')
@section('title','Checkout')
@section('content')
<div class="container-shop"><h2 class="mb-4">Checkout</h2><form method="POST" action="{{route('checkout.store')}}" class="row g-4">@csrf
<div class="col-md-7"><div class="bg-white p-4 rounded"><h5 class="mb-3">Customer Information</h5><input class="form-control mb-3" name="customer_name" value="{{old('customer_name')}}" placeholder="Full name" required><input class="form-control mb-3" name="phone" value="{{old('phone')}}" placeholder="Phone" required><input class="form-control mb-3" name="email" value="{{old('email')}}" placeholder="Email (optional)"><textarea class="form-control" name="address" rows="5" placeholder="Shipping address" required>{{old('address')}}</textarea></div></div>
<div class="col-md-5"><div class="bg-white p-4 rounded"><h5 class="mb-3">Order Summary</h5>@php($subtotal=0)@foreach($cart as $item) @php($line=$item['price']*$item['quantity']) @php($subtotal+=$line)<div class="d-flex justify-content-between mb-2"><span>{{$item['name']}} × {{$item['quantity']}}</span><strong>৳{{number_format($line,2)}}</strong></div>@endforeach<hr><div class="d-flex justify-content-between h5"><span>Total</span><strong>৳{{number_format($subtotal,2)}}</strong></div><button class="btn-shop w-100 mt-3" type="submit">Place Order</button></div></div>
</form></div>
@endsection
