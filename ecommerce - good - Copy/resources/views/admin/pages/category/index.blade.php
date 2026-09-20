@extends('admin.layouts.master')

@section('title', 'Categories')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Category List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Categories</div></li>
            </ul>
        </div>
        <a class="tf-button" href="{{ route('categories.create') }}"><i class="icon-plus"></i>Add Category</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('categories.index') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search category...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count">{{ $categories->total() }} category(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-category-table">
                <div class="ecom-table-head">
                    <div class="cell">Category</div>
                    <div class="cell">Parent</div>
                    <div class="cell">Products</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>
                @forelse($categories as $category)
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-product-cell">
                                <div class="ecom-thumb"><i class="icon-layers" style="font-size:20px;color:var(--Main)"></i></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate">{{ $category->name }}</div>
                                    <div class="ecom-muted">{{ $category->slug }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">{{ $category->parent->name ?? 'None' }}</div>
                        <div class="cell">{{ number_format($category->products_count) }}</div>
                        <div class="cell"><span class="ecom-status {{ $category->status === 'active' ? '' : 'inactive' }}">{{ ucfirst($category->status) }}</span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('categories.edit', $category) }}" class="item edit" title="Edit category"><i class="icon-edit-3"></i></a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="item trash" title="Delete category"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No categories found.</div>
                @endforelse
            </div>
        </div>
        <div class="ecom-pagination">{{ $categories->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection
