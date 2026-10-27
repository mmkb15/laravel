@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Orders</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Orders</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-20">{{ session('success') }}</div>
        @endif

        <div class="wg-box">
            <div class="title-box flex justify-between items-center mb-14">
                <h5>Order List</h5>
            </div>

            <div class="wg-filter flex-grow mb-14">
                <form class="form-search flex gap10" method="GET" action="{{ route('orders.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search order ID...">
                    <select name="status" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        @foreach (['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>

            <div class="wg-table table-all-user">
                <ul class="table-title flex gap20 mb-14">
                    <li><span class="body-title">Order #</span></li>
                    <li><span class="body-title">Customer</span></li>
                    <li><span class="body-title">Total</span></li>
                    <li><span class="body-title">Status</span></li>
                    <li><span class="body-title">Date</span></li>
                    <li><span class="body-title">Action</span></li>
                </ul>

                <ul class="flex flex-column">
                    @forelse ($orders as $order)
                        <li class="product-item gap14">
                            <div class="body-text">#{{ $order->id }}</div>
                            <div class="body-text">{{ $order->user->name ?? 'N/A' }}</div>
                            <div class="body-text">৳{{ number_format($order->total, 2) }}</div>
                            <div class="body-text">
                                @if (in_array($order->status, ['delivered']))
                                    <span class="block-available">{{ ucfirst($order->status) }}</span>
                                @elseif ($order->status === 'cancelled')
                                    <span class="block-not-available">{{ ucfirst($order->status) }}</span>
                                @else
                                    <span class="text-tiny">{{ ucfirst($order->status) }}</span>
                                @endif
                            </div>
                            <div class="body-text">{{ $order->created_at->format('d M, Y') }}</div>
                            <div class="list-icon-function">
                                <a href="{{ route('orders.show', $order) }}" class="item eye">
                                    <i class="icon-eye"></i>
                                </a>
                                <a href="{{ route('orders.edit', $order) }}" class="item edit">
                                    <i class="icon-edit-3"></i>
                                </a>
                            </div>
                        </li>
                    @empty
                        <li class="body-text">No orders found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="wg-pagination">
                {{ $orders->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
