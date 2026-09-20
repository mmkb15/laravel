@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Users</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Users</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>User List</h5>
                <a href="{{ route('users.create') }}" class="tf-button">
                    <i class="icon-plus"></i> Add New User
                </a>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search" method="GET" action="{{ route('users.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email...">
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">ID</span></li>
                    <li><span class="body-title">Name</span></li>
                    <li><span class="body-title">Email</span></li>
                    <li><span class="body-title">Role</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($users as $user)
                        <li class="product-item gap14">
                            <div class="body-text">{{ $user->id }}</div>
                            <div class="body-text">{{ $user->name }}</div>
                            <div class="body-text">{{ $user->email }}</div>
                            <div class="body-text">{{ $user->role->name ?? '-' }}</div>
                            <div class="list-icon-function">
                                <a href="{{ route('users.show', $user) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', $user) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No users found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
