@extends('admin.layouts.master')

@section('title', 'Brand List')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All brands</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Brand</div></li>
            </ul>
        </div>

        @if (session('success'))
            <div class="block-available mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="flex items-center justify-between mb-20">
                <h5>All Brands</h5>
                <a href="{{ route('brands.create') }}" class="tf-button style-1 w208">
                    <i class="icon-plus"></i> Add New
                </a>
            </div>

            <div class="wg-table table-all-category">
                <ul class="table-title flex gap20 mb-14">
                    <li><div class="body-title">Image</div></li>
                    <li><div class="body-title">Name</div></li>
                    <li><div class="body-title">Status</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>

                <ul class="flex flex-column gap10">
                    @forelse ($brands as $brand)
                        <li class="product-item">
                            <div class="image small">
                                @if ($brand->image)
                                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}">
                                @else
                                    <i class="icon-image"></i>
                                @endif
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name body-text">{{ $brand->name }}</div>
                                <div>
                                    @if ($brand->status === 'Active')
                                        <div class="block-available">Active</div>
                                    @else
                                        <div class="block-not-available">Inactive</div>
                                    @endif
                                </div>
                                <div class="list-icon-function">
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this brand?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item trash" style="background:none;border:none;">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="product-item"><div class="body-text">No brands found.</div></li>
                    @endforelse
                </ul>
            </div>

            <div class="mt-20">
                {{ $brands->links('vendor.pagination.custom-admin') }}
            </div>
        </div>
    </div>
</div>
@endsection
