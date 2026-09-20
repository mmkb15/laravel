@extends('admin.layouts.master')
@section('title','Product List')
@section('content')
<div class="main-content-wrap">
@include('admin.partials.alerts')
<div class="wg-box">
<div class="flex items-center justify-between gap10 flex-wrap mb-20"><h5>Products</h5><a class="tf-button style-1 w208" href="{{ route('products.create') }}"><i class="icon-plus"></i> Add Product</a></div>
<form method="GET" class="wg-filter flex-grow mb-20"><fieldset class="name"><input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..."></fieldset><button class="tf-button" type="submit">Search</button></form>
<div class="wg-table table-product-list">
<ul class="table-title flex gap20 mb-14"><li><div class="body-title">Product</div></li><li><div class="body-title">Category</div></li><li><div class="body-title">Price</div></li><li><div class="body-title">Stock</div></li><li><div class="body-title">Status</div></li><li><div class="body-title">Action</div></li></ul>
@forelse($products as $product)
<li class="product-item gap14"><div class="image no-bg">
@php($sku=$product->skus->first())
@if($sku?->image_url)<img src="{{ asset('storage/'.$sku->image_url) }}" alt="{{ $product->name }}">@else<img src="{{ asset('assets/images/products/1.png') }}" alt="{{ $product->name }}">@endif
</div><div class="flex items-center justify-between gap20 flex-grow">
<div class="name"><a class="body-title-2" href="{{ route('shop.show',$product) }}">{{ $product->name }}</a><div class="text-tiny">{{ $product->brand?->name ?? 'No brand' }}</div></div>
<div class="body-text">{{ $product->category?->name ?? '-' }}</div><div class="body-text">{{ $sku ? number_format($sku->price,2) : '—' }}</div><div class="body-text">{{ $sku?->stock_quantity ?? 0 }}</div>
<div>@if($product->is_active)<div class="block-available">Active</div>@else<div class="block-not-available">Inactive</div>@endif</div>
<div class="list-icon-function"><a href="{{ route('products.edit',$product) }}" class="item edit"><i class="icon-edit-3"></i></a><button type="button" class="item trash js-delete" data-action="{{ route('products.destroy',$product) }}" style="background:none;border:0"><i class="icon-trash-2"></i></button></div>
</div></li>
@empty<li class="product-item"><div class="body-text">No products found.</div></li>@endforelse
</ul></div><div class="divider"></div>{{ $products->links() }}
</div></div>
@include('admin.partials.delete-modal')
@endsection
