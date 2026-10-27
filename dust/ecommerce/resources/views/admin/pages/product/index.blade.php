@extends('admin.layouts.master')

@section('title', 'Product List')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Product list</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Ecommerce</div></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Product list</div></li>
            </ul>
        </div>

        @if (session('success'))
            <div class="block-available mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <form class="form-search" method="GET" action="{{ route('products.index') }}">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." name="name" value="{{ request('name') }}">
                    </fieldset>
                    <div class="button-submit">
                        <button type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
                <a class="tf-button style-1 w208" href="{{ route('products.create') }}"><i class="icon-plus"></i>Add Product</a>
            </div>

            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li><div class="body-title">Product</div></li>
                    <li><div class="body-title">Category</div></li>
                    <li><div class="body-title">Status</div></li>
                    <li><div class="body-title">Created</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>
                <ul class="flex flex-column">
                    @forelse ($products as $product)
                        <li class="product-item gap14">
                            <div class="image">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                @else
                                    <i class="icon-image" style="font-size:24px;"></i>
                                @endif
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="{{ route('products.show', $product->id) }}" class="body-title-2">{{ $product->name }}</a>
                                </div>
                                <div class="body-text">{{ $product->category->name ?? '-' }}</div>
                                <div>
                                    @if ($product->status === 'Active')
                                        <div class="block-available">Active</div>
                                    @else
                                        <div class="block-not-available">Inactive</div>
                                    @endif
                                </div>
                                <div class="body-text">{{ $product->created_at->format('d M Y') }}</div>
                                <div class="list-icon-function">
                                    <a href="{{ route('products.show', $product->id) }}" class="item eye">
                                        <i class="icon-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this product?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item trash" style="background:none;border:none;padding:0;">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="product-item"><div class="body-text">No products found.</div></li>
                    @endforelse
                </ul>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $products->count() }} of {{ $products->total() }} entries</div>
                {{ $products->links('vendor.pagination.custom-admin') }}
            </div>
        </div>
    </div>
</div>
@endsection
