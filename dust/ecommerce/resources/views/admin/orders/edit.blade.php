@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Update Order Status — #{{ $order->id }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Update Status</li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-add-product" action="{{ route('orders.update', $order) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="wg-box">
                    <fieldset class="status">
                        <div class="body-title mb-10">Order Status <span class="tf-color-1">*</span></div>
                        <select class="mb-10" name="status" required>
                            @foreach (['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                                <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('status') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                    </fieldset>

                    <div class="bot flex justify-between gap10 mt-30">
                        <a href="{{ route('orders.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button type="submit" class="tf-button w208">Update Status</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
