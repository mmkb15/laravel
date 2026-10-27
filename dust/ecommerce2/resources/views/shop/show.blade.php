@extends('shop.layout')
@section('title',$product->name)
@section('content')
<div class="container-shop"><div class="row g-5"><div class="col-md-6">@php($sku=$product->skus->first()) @if($sku?->image_url)<img class="img-fluid rounded" src="{{asset('storage/'.$sku->image_url)}}" alt="{{$product->name}}">@else<img class="img-fluid rounded" src="{{asset('assets/images/products/1.png')}}" alt="{{$product->name}}">@endif</div>
<div class="col-md-6"><div class="text-muted">{{$product->category?->name}} @if($product->brand) · {{$product->brand->name}} @endif</div><h1 class="mb-3">{{$product->name}}</h1><div class="price mb-3">৳{{number_format($sku?->price ?? 0,2)}}</div><p class="text-muted">{{$product->description}}</p><p>Stock: {{$sku?->stock_quantity ?? 0}}</p>
@if($sku && $sku->stock_quantity>0)<form method="POST" action="{{route('cart.add',$sku)}}" class="d-flex gap-2">@csrf<input type="number" min="1" max="{{$sku->stock_quantity}}" name="quantity" value="1" class="form-control" style="max-width:120px"><button class="btn-shop">Add to Cart</button></form>@else<div class="alert alert-warning">Out of stock.</div>@endif
</div></div></div>
@endsection
