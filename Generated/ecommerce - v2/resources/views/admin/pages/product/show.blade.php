@extends('admin.layouts.master')

@section('title', 'Product Details')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>{{ $product->name }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('products.index') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">{{ $product->name }}</div></li>
            </ul>
        </div>
        <div class="flex gap10">
            <a class="tf-button style-2" href="{{ route('products.index') }}"><i class="icon-arrow-left"></i>Back</a>
            <a class="tf-button" href="{{ route('products.edit', $product) }}"><i class="icon-edit-3"></i>Edit Product</a>
        </div>
    </div>

    <div class="ecom-detail-grid">
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Product Images</h5></div>
            @if($product->images->count())
                <div class="ecom-gallery">
                    @foreach($product->images as $image)
                        <div class="ecom-gallery-item">
                            <img src="{{ $image->url }}" alt="{{ $product->name }}">
                            @if($image->is_primary)<span class="ecom-gallery-badge">Primary</span>@endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="ecom-empty">No product images yet.</div>
            @endif

            <div class="form-card-title" style="margin-top:8px;"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="body-text">{{ $product->description ?: 'No description provided.' }}</div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Product Information</h5></div>
            <div class="detail-list">
                <div class="detail-row"><div class="detail-label">SKU</div><div class="detail-value">{{ $product->sku }}</div></div>
                <div class="detail-row"><div class="detail-label">Category</div><div class="detail-value">{{ $product->category->name ?? 'N/A' }}</div></div>
                <div class="detail-row"><div class="detail-label">Brand</div><div class="detail-value">{{ $product->brand->name ?? 'No brand' }}</div></div>
                <div class="detail-row"><div class="detail-label">Regular Price</div><div class="detail-value">${{ number_format($product->price, 2) }}</div></div>
                <div class="detail-row"><div class="detail-label">Sale Price</div><div class="detail-value">{{ $product->sale_price ? '$' . number_format($product->sale_price, 2) : '—' }}</div></div>
                <div class="detail-row"><div class="detail-label">Stock</div><div class="detail-value">{{ number_format($product->stock) }} units</div></div>
                <div class="detail-row">
                    <div class="detail-label">Status</div>
                    <div class="detail-value"><span class="ecom-status {{ $product->status === 'active' ? '' : 'inactive' }}">{{ ucfirst($product->status) }}</span></div>
                </div>
                <div class="detail-row"><div class="detail-label">Created</div><div class="detail-value">{{ $product->created_at->format('d M Y, h:i A') }}</div></div>
                <div class="detail-row"><div class="detail-label">Last Updated</div><div class="detail-value">{{ $product->updated_at->format('d M Y, h:i A') }}</div></div>
            </div>
        </div>
    </div>
</div>
@endsection
