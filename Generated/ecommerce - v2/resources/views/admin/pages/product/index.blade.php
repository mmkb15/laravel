@extends('admin.layouts.master')

@section('title', 'Products')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Product List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Products</div></li>
            </ul>
        </div>
        <a class="tf-button style-1 w180" href="{{ route('products.create') }}">
            <i class="icon-plus"></i>Add Product
        </a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('products.index') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search product or SKU...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count">{{ $products->total() }} product(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-product-table">
                <div class="ecom-table-head">
                    <div class="cell">Product</div>
                    <div class="cell">SKU</div>
                    <div class="cell">Category</div>
                    <div class="cell">Price</div>
                    <div class="cell">Stock</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>

                @forelse($products as $product)
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-product-cell">
                                <div class="ecom-thumb"><img src="{{ $product->image_url }}" alt="{{ $product->name }}"></div>
                                <div class="min-w-0">
                                    <a href="{{ route('products.edit', $product) }}" class="ecom-primary text-truncate d-block">{{ $product->name }}</a>
                                    <div class="ecom-muted">#{{ $product->id }}{{ $product->brand ? ' · '.$product->brand->name : '' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell"><span class="body-text">{{ $product->sku }}</span></div>
                        <div class="cell"><span class="body-text">{{ $product->category->name ?? 'Uncategorized' }}</span></div>
                        <div class="cell"><span class="ecom-money">${{ $product->display_price }}</span></div>
                        <div class="cell"><span class="body-text">{{ number_format($product->stock) }}</span></div>
                        <div class="cell">
                            <span class="ecom-status {{ $product->status === 'active' ? '' : 'inactive' }}">{{ ucfirst($product->status) }}</span>
                        </div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('products.show', $product) }}" class="item eye" title="View product"><i class="icon-eye"></i></a>
                                <a href="{{ route('products.edit', $product) }}" class="item edit" title="Edit product"><i class="icon-edit-3"></i></a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="item trash" title="Delete product"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No products found.</div>
                @endforelse
            </div>
        </div>

        <div class="ecom-pagination">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection
