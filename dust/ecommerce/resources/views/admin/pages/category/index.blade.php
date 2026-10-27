@extends('admin.layouts.master')

@section('title', 'All Category')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All category</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#"><div class="text-tiny">Category</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">All category</div></li>
            </ul>
        </div>

        @if (session('success'))
            <div class="block-available mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <div class="show">
                        <div class="text-tiny">Showing</div>
                        <div class="select">
                            <form method="GET" action="{{ route('categories.index') }}" id="perPageForm">
                                <select name="per_page" onchange="document.getElementById('perPageForm').submit()">
                                    <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                </select>
                            </form>
                        </div>
                        <div class="text-tiny">entries</div>
                    </div>
                    <form class="form-search" method="GET" action="{{ route('categories.index') }}">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." name="name" value="{{ request('name') }}">
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 w208" href="{{ route('categories.create') }}"><i class="icon-plus"></i>Add new</a>
            </div>

            <div class="wg-table table-all-category">
                <ul class="table-title flex gap20 mb-14">
                    <li><div class="body-title">Category</div></li>
                    <li><div class="body-title">Parent</div></li>
                    <li><div class="body-title">Description</div></li>
                    <li><div class="body-title">Created</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>
                <ul class="flex flex-column">
                    @forelse ($categories as $category)
                        <li class="product-item gap14">
                            <div class="image no-bg">
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}">
                                @else
                                    <i class="icon-grid" style="font-size:24px;"></i>
                                @endif
                            </div>
                            <div class="flex items-center justify-between gap20 flex-grow">
                                <div class="name">
                                    <a href="{{ route('categories.show', $category->id) }}" class="body-title-2">{{ $category->name }}</a>
                                </div>
                                <div class="body-text">{{ $category->parent->name ?? '-' }}</div>
                                <div class="body-text">{{ \Illuminate\Support\Str::limit($category->description, 30) ?: '-' }}</div>
                                <div class="body-text">{{ $category->created_at->format('d M Y') }}</div>
                                <div class="list-icon-function">
                                    <a href="{{ route('categories.show', $category->id) }}" class="item eye">
                                        <i class="icon-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this category?');" style="display:inline;">
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
                        <li class="product-item">
                            <div class="body-text">No categories found.</div>
                        </li>
                    @endforelse
                </ul>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $categories->count() }} of {{ $categories->total() }} entries</div>
                {{ $categories->links('vendor.pagination.custom-admin') }}
            </div>
        </div>
    </div>
</div>
@endsection
