@extends('shop.layout')
@section('title','Shop | Mursalin')
@section('content')
<div class="container-shop">
<div class="d-flex justify-content-between align-items-center mb-4"><div><h2>Shop</h2><p class="text-muted mb-0">Browse available products.</p></div>
<form class="d-flex" method="GET"><input class="form-control me-2" name="search" value="{{request('search')}}" placeholder="Search product"><button class="btn-shop" type="submit">Search</button></form></div>
<div class="row g-4">@forelse($products as $product) @php($sku=$product->skus->first())
<div class="col-md-4 col-lg-3"><div class="shop-card">
<a href="{{route('shop.show',$product)}}">@if($sku?->image_url)<img src="{{asset('storage/'.$sku->image_url)}}" alt="{{$product->name}}">@else<img src="{{asset('assets/images/products/1.png')}}" alt="{{$product->name}}">@endif</a>
<div class="shop-card-body"><div class="text-muted small">{{$product->category?->name}}</div><h5 class="mt-1"><a class="text-decoration-none" href="{{route('shop.show',$product)}}">{{$product->name}}</a></h5><div class="price mb-3">৳{{number_format($sku?->price ?? 0,2)}}</div>
@if($sku && $sku->stock_quantity>0)<form method="POST" action="{{route('cart.add',$sku)}}">@csrf<input type="hidden" name="quantity" value="1"><button class="btn-shop w-100">Add to Cart</button></form>@else<span class="text-danger">Out of stock</span>@endif
</div></div></div>
@empty<div class="col-12"><div class="alert alert-info">No products found.</div></div>@endforelse</div>
<div class="mt-4">{{$products->links()}}</div></div>
@endsection
