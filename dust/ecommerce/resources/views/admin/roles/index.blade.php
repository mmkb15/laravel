@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Roles</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Roles</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>Role List</h5>
                <a href="{{ route('roles.create') }}" class="tf-button">
                    <i class="icon-plus"></i> Add New Role
                </a>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search" method="GET" action="{{ route('roles.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search role name...">
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">ID</span></li>
                    <li><span class="body-title">Name</span></li>
                    <li><span class="body-title">Created At</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($roles as $role)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $role->id }}</div>
                            <div class="body-text">{{ $role->name }}</div>
                            <div class="body-text">{{ $role->created_at->format('d M, Y') }}</div>
                            <div class="list-icon-function">
                                <a href="{{ route('roles.show', $role) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('roles.edit', $role) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                                <form action="{{ route('roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No roles found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $roles->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
