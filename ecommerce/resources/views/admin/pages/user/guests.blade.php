@extends('admin.layouts.master')

@section('title', 'Guest Customers')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Guest Customers</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('users.index') }}"><div class="text-tiny">Users</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Guest Customers</div></li>
            </ul>
        </div>
        <div class="flex items-center flex-wrap gap10">
            <a class="tf-button style-2" href="{{ route('users.index') }}">Registered Users</a>
        </div>
    </div>

    <div class="wg-box">
        <div class="flex items-center flex-wrap gap10">
            <a class="tf-button style-2" href="{{ route('users.index') }}">Registered Users</a>
            <a class="tf-button" href="{{ route('users.guests') }}">Guest Customers</a>
        </div>
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="{{ route('users.guests') }}">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Search guest customer, email or phone...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count">{{ $guestCustomers->total() }} guest customer(s)</div>
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
                @forelse($guestCustomers as $customer)
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-user-cell">
                                <div class="ecom-thumb user">
                                    <img src="{{ $customer->image_url }}" alt="{{ $customer->name }}">
                                </div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate">{{ $customer->name }}</div>
                                    <div class="ecom-muted">
                                        #{{ $customer->id }}
                                        ·
                                        <a href="{{ route('orders.index', ['search' => $customer->name]) }}" class="ecom-muted">
                                            {{ $customer->orders_count }} {{ \Illuminate\Support\Str::plural('order', $customer->orders_count) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell text-truncate">{{ $customer->email ?: '—' }}</div>
                        <div class="cell">{{ $customer->phone }}</div>
                        <div class="cell"><span class="ecom-status">Guest</span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="{{ route('users.guests.edit', $customer) }}" class="item edit" title="Edit guest customer"><i class="icon-edit-3"></i></a>
                                <form method="POST" action="{{ route('users.guests.destroy', $customer) }}" onsubmit="return confirm('Delete this guest profile? Their order history will be kept.');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="item trash" type="submit" title="Delete guest profile"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ecom-empty">No guest customers found.</div>
                @endforelse
            </div>
        </div>
        <div class="ecom-pagination">{{ $guestCustomers->onEachSide(1)->links() }}</div>
    </div>
</div>
@endsection
