@extends('admin.layouts.master')
@section('title','Category List')
@section('content')
<div class="main-content-wrap">
    @include('admin.partials.alerts')
    <div class="wg-box">
        <div class="flex items-center justify-between mb-20">
            <h5>All Categories</h5>
            <a href="{{ route('categories.create') }}" class="tf-button"><i class="icon-plus"></i> Add New</a>
        </div>
        <div class="wg-table table-all-category">
            <ul class="table-title flex gap20 mb-14">
                <li><div class="body-title">Name</div></li><li><div class="body-title">Parent</div></li><li><div class="body-title">Description</div></li><li><div class="body-title">Action</div></li>
            </ul>
            @forelse($categories as $category)
            <li class="product-item">
                <div class="flex items-center justify-between flex-grow gap20">
                    <div class="name body-text">{{ $category->name }}</div>
                    <div class="body-text">{{ $category->parent?->name ?? '-' }}</div>
                    <div class="body-text">{{ \Illuminate\Support\Str::limit($category->description, 45) }}</div>
                    <div class="list-icon-function">
                        <a href="{{ route('categories.edit',$category) }}" class="item edit"><i class="icon-edit-3"></i></a>
                        <form action="{{ route('categories.destroy',$category) }}" method="POST" class="delete-form">@csrf @method('DELETE')
                            <button type="button" class="item trash js-delete" data-action="{{ route('categories.destroy',$category) }}"><i class="icon-trash-2"></i></button>
                        </form>
                    </div>
                </div>
            </li>
            @empty <li class="product-item"><div class="body-text">No categories found.</div></li> @endforelse
        </div>
        <div class="mt-20">{{ $categories->links() }}</div>
    </div>
</div>
@include('admin.partials.delete-modal')
@endsection
