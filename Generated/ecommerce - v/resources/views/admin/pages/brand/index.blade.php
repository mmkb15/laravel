@extends('admin.layouts.master')

@section('title', 'Brands')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Brand List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Brands</div></li>
            </ul>
        </div>
        <a class="tf-button" href="{{ route('brands.create') }}"><i class="icon-plus"></i>Add Brand</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('brands.index') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search brand...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count">{{ $brands->total() }} brand(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-brand-table">
                <div class="ecom-table-head">
                    <div class="cell">Brand</div>
                    <div class="cell">Products</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>
                @forelse($brands as $brand)
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-product-cell">
                                <div class="ecom-thumb"><i class="icon-box" style="font-size:20px;color:var(--Main)"></i></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate">{{ $brand->name }}</div>
                                    <div class="ecom-muted">{{ $brand->slug }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">{{ number_format($brand->products_count) }}</div>
                        <div class="cell"><span class="ecom-status {{ $brand->status === 'active' ? '' : 'inactive' }}">{{ ucfirst($brand->status) }}</span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('brands.edit', $brand) }}" class="item edit" title="Edit brand"><i class="icon-edit-3"></i></a>
                                <form action="{{ route('brands.destroy', $brand) }}" method="POST" onsubmit="return confirm('Delete this brand?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="item trash" title="Delete brand"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No brands found.</div>
                @endforelse
            </div>
        </div>
        <div class="ecom-pagination">{{ $brands->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection
