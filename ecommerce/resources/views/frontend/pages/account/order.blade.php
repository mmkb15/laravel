@extends('frontend.layouts.master')

@section('title', 'Order '.$customerOrder->order_number)

@section('content')
<main id="main" class="account-page">
    <div class="container">
        <a href="{{ route('account.index') }}" class="account-back">‹ Back to my account</a>
        <div class="account-heading">
            <div>
                <p class="account-eyebrow">Order details</p>
                <h1>{{ $customerOrder->order_number }}</h1>
                <p>Placed {{ $customerOrder->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <span class="account-order-status {{ $customerOrder->status }}">{{ ucfirst($customerOrder->status) }}</span>
        </div>

        <div class="account-order-detail-grid">
            <section class="account-card">
                <div class="account-card-heading"><h2>Items</h2></div>
                @foreach($customerOrder->items as $item)
                    <div class="account-order-line">
                        <div><strong>{{ $item->product_name }}</strong><small>Qty {{ $item->quantity }} × ${{ number_format($item->unit_price, 2) }}</small></div>
                        <strong>${{ number_format($item->subtotal, 2) }}</strong>
                    </div>
                @endforeach
                <div class="account-order-summary">
                    <div><span>Subtotal</span><strong>${{ number_format($customerOrder->subtotal, 2) }}</strong></div>
                    <div><span>Shipping</span><strong>${{ number_format($customerOrder->shipping_cost, 2) }}</strong></div>
                    <div class="grand-total"><span>Total</span><strong>${{ number_format($customerOrder->total, 2) }}</strong></div>
                </div>
            </section>
            <section class="account-card">
                <div class="account-card-heading"><h2>Delivery information</h2></div>
                <dl class="account-shipping">
                    <dt>Name</dt><dd>{{ $customerOrder->shipping_name }}</dd>
                    <dt>Phone</dt><dd>{{ $customerOrder->shipping_phone }}</dd>
                    <dt>Address</dt><dd>{{ $customerOrder->shipping_address }}</dd>
                    <dt>Payment</dt><dd>{{ $customerOrder->payment_method === 'cod' ? 'Cash on delivery' : ucfirst($customerOrder->payment_method) }}</dd>
                    <dt>Payment status</dt><dd>{{ ucfirst($customerOrder->payment_status) }}</dd>
                </dl>
            </section>
        </div>
    </div>
</main>
@endsection

@section('style')
<style>
    .account-page { padding: 48px 0 80px; color: #172033; }
    .account-page .container { max-width: 1180px; }
    .account-back { display: inline-block; margin-bottom: 22px; color: #5145e5; font-weight: 700; text-decoration: none; }
    .account-heading { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 28px; }
    .account-heading h1 { margin: 4px 0 8px; font-size: clamp(28px, 4vw, 38px); }
    .account-heading p { color: #64748b; }
    .account-eyebrow { margin: 0; color: #5145e5; font-size: 12px; font-weight: 700; letter-spacing: .09em; text-transform: uppercase; }
    .account-order-status { padding: 6px 11px; border-radius: 20px; background: #f1f5f9; color: #475569; font-size: 13px; }
    .account-order-status.delivered { background: #e9f9f0; color: #16834b; }
    .account-order-status.cancelled { background: #fff0f0; color: #c43d3d; }
    .account-order-status.pending { background: #fff7e6; color: #a96500; }
    .account-order-detail-grid { display: grid; grid-template-columns: minmax(0, 1.4fr) minmax(260px, .8fr); gap: 22px; align-items: start; }
    .account-card { overflow: hidden; border: 1px solid #e5eaf2; border-radius: 18px; background: #fff; box-shadow: 0 12px 36px #15233b0a; }
    .account-card-heading { min-height: 72px; padding: 18px 22px; border-bottom: 1px solid #edf0f5; }
    .account-card-heading h2 { margin: 0; font-size: 20px; }
    .account-order-line { display: flex; justify-content: space-between; gap: 20px; padding: 18px 22px; border-bottom: 1px solid #edf0f5; }
    .account-order-line div { display: grid; gap: 5px; }
    .account-order-line small { color: #788499; }
    .account-order-summary { display: grid; gap: 14px; padding: 20px 22px; }
    .account-order-summary div { display: flex; justify-content: space-between; gap: 20px; }
    .account-order-summary .grand-total { padding-top: 14px; border-top: 1px solid #edf0f5; font-size: 18px; }
    .account-shipping { display: grid; grid-template-columns: 105px 1fr; gap: 14px; padding: 22px; margin: 0; }
    .account-shipping dt { color: #788499; }
    .account-shipping dd { margin: 0; overflow-wrap: anywhere; font-weight: 600; }
    @media (max-width: 760px) { .account-order-detail-grid { grid-template-columns: 1fr; } .account-heading { align-items: flex-start; flex-direction: column; } }
</style>
@endsection
