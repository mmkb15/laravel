@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Attributes</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Attributes</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>Attribute List</h5>
                <a href="{{ route('attributes.create') }}" class="tf-button">
                    <i class="icon-plus"></i> Add New Attribute
                </a>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search" method="GET" action="{{ route('attributes.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search attribute name...">
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">ID</span></li>
                    <li><span class="body-title">Name</span></li>
                    <li><span class="body-title">Values</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($attributes as $attribute)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $attribute->id }}</div>
                            <div class="body-text">{{ $attribute->name }}</div>
                            <div class="body-text">
                                @foreach ($attribute->values as $value)
                                    <span class="badge">{{ $value->value }}</span>@if (!$loop->last), @endif
                                @endforeach
                            </div>
                            <div class="list-icon-function">
                                <a href="{{ route('attributes.show', $attribute) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('attributes.edit', $attribute) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                                <form action="{{ route('attributes.destroy', $attribute) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this attribute?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No attributes found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $attributes->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
