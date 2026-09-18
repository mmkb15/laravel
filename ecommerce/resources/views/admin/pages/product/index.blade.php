@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Product List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#"><div class="text-tiny">Ecommerce</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Product List</div></li>
            </ul>
        </div>

        <div class="wg-box">
            @if(session('success'))
                <div class="alert alert-success mb-10">{{ session('success') }}</div>
            @endif

            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('products.create') }}">
                    <i class="icon-plus"></i>Add new
                </a>
            </div>

            <div class="wg-table table-product-list">
                <ul class="table-title flex gap20 mb-14">
                    <li><div class="body-title">Product</div></li>
                    <li><div class="body-title">Product ID</div></li>
                    <li><div class="body-title">Category</div></li>
                    <li><div class="body-title">Status</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse($products as $product)
                    <li class="product-item gap14">
                        <div class="image no-bg">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('images/products/default.png') }}" alt="No Image">
                            @endif
                        </div>
                        <div class="flex items-center justify-between gap20 flex-grow">
                            <div class="name">
                                <a href="#" class="body-title-2">{{ $product->name }}</a>
                            </div>
                            <div class="body-text">#{{ $product->id }}</div>
                            <div class="body-text">{{ $product->category->name ?? 'N/A' }}</div>
                            <div>
                                @if($product->status == 'active')
                                    <div class="block-available">Active</div>
                                @else
                                    <div class="block-not-available">Inactive</div>
                                @endif
                            </div>
                            <div class="list-icon-function">
                                <a href="{{ route('products.edit', $product->id) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="item trash" style="background:none; border:none; cursor:pointer;">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @empty
                    <li class="product-item">
                        <div class="body-text">No products found.</div>
                    </li>
                    @endforelse
                </ul>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $products->count() }} entries</div>
            </div>
        </div>
    </div>
</div>
@endsection