@extends('admin.layouts.master')

@section('title', 'Create Order')

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>Create Order</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="{{ route('orders.index') }}"><div class="text-tiny">Orders</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Create Order</div></li>
        </ul>
    </div>

    @if($errors->any())<div class="alert alert-danger mb-20">{{ $errors->first() }}</div>@endif

    <form class="template-form two-col" method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-plus"></i><h5>Order Information</h5></div>
            <div class="template-field">
                <label for="user_id">Customer</label>
                <div class="template-select">
                    <select id="user_id" name="user_id">
                        <option value="">Guest Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" @selected(old('user_id') == $customer->id)>{{ $customer->name }} — {{ $customer->email }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="template-field">
                <label for="product_id">Product <span class="required">*</span></label>
                <div class="template-select">
                    <select id="product_id" name="product_id" required>
                        <option value="">Choose product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" @selected(old('product_id') == $product->id)>{{ $product->name }} — ${{ $product->display_price }} ({{ $product->stock }} in stock)</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="quantity">Quantity <span class="required">*</span></label>
                    <input id="quantity" class="template-input" type="number" name="quantity" value="{{ old('quantity',1) }}" min="1" required>
                </div>
                <div class="template-field">
                    <label for="payment_method">Payment Method <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="payment_method" name="payment_method" required>
                            <option value="cod" @selected(old('payment_method') === 'cod')>Cash on Delivery</option>
                            <option value="bank" @selected(old('payment_method') === 'bank')>Bank Transfer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="template-field">
                <label for="notes">Order Notes</label>
                <textarea id="notes" name="notes" placeholder="Optional order notes...">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-map-pin"></i><h5>Shipping Information</h5></div>
            <div class="template-field">
                <label for="shipping_name">Shipping Name <span class="required">*</span></label>
                <input id="shipping_name" class="template-input" type="text" name="shipping_name" value="{{ old('shipping_name') }}" required>
            </div>
            <div class="template-field">
                <label for="shipping_phone">Shipping Phone <span class="required">*</span></label>
                <input id="shipping_phone" class="template-input" type="tel" name="shipping_phone" value="{{ old('shipping_phone') }}" required>
            </div>
            <div class="template-field">
                <label for="shipping_address">Shipping Address <span class="required">*</span></label>
                <textarea id="shipping_address" name="shipping_address" placeholder="Enter full shipping address" required>{{ old('shipping_address') }}</textarea>
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Create Order</button>
                <a class="tf-button style-2 w-full" href="{{ route('orders.index') }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
