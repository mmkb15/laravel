@extends('admin.layouts.master')

@section('title', 'Category List')

@section('content')
<div class="main-content-wrap">
    @if (session('success'))
        <div class="block-available mb-20">{{ session('success') }}</div>
    @endif

    <div class="wg-box">
        <div class="flex items-center justify-between mb-20">
            <h5>All Categories</h5>
            <a href="{{ route('categories.create') }}" class="tf-button">
                <i class="icon-plus"></i> Add New
            </a>
        </div>

        <div class="wg-table table-all-category">
            <ul class="table-title flex gap20 mb-14">
                <li><div class="body-title">Name</div></li>
                <li><div class="body-title">Parent</div></li>
                <li><div class="body-title">Action</div></li>
            </ul>

            @foreach ($categories as $category)
                <li class="product-item">
                    <div class="flex items-center justify-between flex-grow">
                        <div class="name body-text">{{ $category->name }}</div>
                        <div class="body-text">{{ $category->parent->name ?? '-' }}</div>
                        <div class="list-icon-function">
                            <a href="{{ route('categories.edit', $category->id) }}" class="item edit">
                                <i class="icon-edit-3"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="item trash" style="background:none;border:none;">
                                    <i class="icon-trash-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </div>

        <div class="mt-20">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection