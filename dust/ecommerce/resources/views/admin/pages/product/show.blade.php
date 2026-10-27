@extends('admin.layouts.master')

@section('title', 'Product Details')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Product details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('products.index') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">{{ $product->name }}</div></li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex flex-wrap gap10 mb-20">
                @forelse ($product->images as $img)
                    <img src="{{ asset('storage/' . $img->image) }}" alt=""
                         style="width:120px; height:120px; object-fit:cover; border-radius:8px; border:1px solid #ECF0F4;">
                @empty
                    <div class="text-tiny">No images uploaded.</div>
                @endforelse
            </div>
            <div class="mb-14"><span class="body-title">Name: </span><span class="body-text">{{ $product->name }}</span></div>
            <div class="mb-14"><span class="body-title">Category: </span><span class="body-text">{{ $product->category->name ?? '-' }}</span></div>
            <div class="mb-14"><span class="body-title">Status: </span><span class="body-text">{{ $product->status }}</span></div>
            <div class="mb-14"><span class="body-title">Vendor ID: </span><span class="body-text">{{ $product->vendor_id }}</span></div>
            <div class="mb-20"><span class="body-title">Description: </span><span class="body-text">{{ $product->description }}</span></div>
            <a href="{{ route('products.edit', $product->id) }}" class="tf-button w208">Edit</a>
            <a href="{{ route('products.index') }}" class="tf-button style-2 w208">Back</a>
        </div>
    </div>
</div>
@endsection
