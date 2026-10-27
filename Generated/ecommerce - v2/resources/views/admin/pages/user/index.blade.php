@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>User List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Users</div></li>
            </ul>
        </div>
        <a class="tf-button" href="{{ route('users.create') }}"><i class="icon-plus"></i>Add User</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('users.index') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search user or email...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count">{{ $users->total() }} user(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-user-table">
                <div class="ecom-table-head">
                    <div class="cell">User</div>
                    <div class="cell">Email</div>
                    <div class="cell">Phone</div>
                    <div class="cell">Role</div>
                    <div class="cell cell-right">Action</div>
                </div>
                @forelse($users as $user)
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-user-cell">
                                <div class="ecom-thumb user"><img src="{{ $user->image_url }}" alt="{{ $user->name }}"></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate">{{ $user->name }}</div>
                                    <div class="ecom-muted">#{{ $user->id }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell text-truncate">{{ $user->email }}</div>
                        <div class="cell">{{ $user->phone ?: '—' }}</div>
                        <div class="cell"><span class="ecom-status {{ $user->role === 'admin' ? 'processing' : '' }}">{{ ucfirst($user->role) }}</span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('users.edit', $user) }}" class="item edit" title="Edit user"><i class="icon-edit-3"></i></a>
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="item trash" title="Delete user"><i class="icon-trash-2"></i></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No users found.</div>
                @endforelse
            </div>
        </div>
        <div class="ecom-pagination">{{ $users->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection
