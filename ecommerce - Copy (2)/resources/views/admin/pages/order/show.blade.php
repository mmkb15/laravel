@extends('admin.layouts.master')

@section('title', 'Order Details')

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header" id="page-header">
        <div>
            <h3>Order {{ $order->order_number }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('orders.index') }}"><div class="text-tiny">Orders</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Order Details</div></li>
            </ul>
        </div>
        <div class="flex gap10" id="action-buttons">
            <button class="tf-button style-2" onclick="window.print()">Print Invoice</button>
            <a class="tf-button style-2" href="{{ route('orders.index') }}">Back to Orders</a>
        </div>
    </div>

    {{-- Invoice header shown only on print --}}
    <div id="print-invoice-header" style="display:none;">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;padding-bottom:16px;border-bottom:2px solid #111;margin-bottom:20px;">
            <div>
                <div style="font-size:22px;font-weight:700;margin-bottom:4px;">INVOICE</div>
                <div style="font-size:14px;color:#666;">{{ $order->order_number }}</div>
                <div style="font-size:13px;color:#666;">Date: {{ $order->created_at->format('d M Y') }}</div>
            </div>
            <div style="text-align:right;">
                <div style="font-size:16px;font-weight:700;">Mursalin Ecommerce</div>
                <div style="font-size:13px;color:#555;margin-top:4px;">
                    Status: <strong style="text-transform:capitalize;">{{ $order->status }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="ecom-detail-grid">
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Order Items</h5></div>
            @forelse($order->items as $item)
                <div class="ecom-order-item">
                    <div class="ecom-thumb print-hide-img"><img src="{{ $item->product?->image_url ?? asset('assets/images/products/1.png') }}" alt="{{ $item->product_name }}"></div>
                    <div class="min-w-0">
                        <div class="ecom-primary text-truncate">{{ $item->product_name }}</div>
                        <div class="ecom-muted">Qty {{ $item->quantity }} × ${{ number_format($item->unit_price,2) }}</div>
                    </div>
                    <div class="ecom-money">${{ number_format($item->subtotal,2) }}</div>
                </div>
            @empty
                <div class="ecom-empty">No order items found.</div>
            @endforelse

            <div class="summary-total">
                <div class="total-row"><span class="body-text">Subtotal</span><strong>${{ number_format($order->subtotal,2) }}</strong></div>
                <div class="total-row"><span class="body-text">Shipping</span><strong>${{ number_format($order->shipping_cost,2) }}</strong></div>
                <div class="total-row"><span class="body-text">Discount</span><strong>-${{ number_format($order->discount,2) }}</strong></div>
                <div class="total-row"><span class="body-title-2">Order Total</span><strong class="body-title-2">${{ number_format($order->total,2) }}</strong></div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Order Summary</h5></div>
            <div class="detail-list">
                <div class="detail-row"><div class="detail-label">Customer</div><div class="detail-value">{{ $order->user?->name ?? $order->shipping_name }}</div></div>
                <div class="detail-row"><div class="detail-label">Email</div><div class="detail-value">{{ $order->user?->email ?? 'Guest customer' }}</div></div>
                <div class="detail-row"><div class="detail-label">Phone</div><div class="detail-value">{{ $order->shipping_phone }}</div></div>
                <div class="detail-row"><div class="detail-label">Address</div><div class="detail-value">{{ $order->shipping_address }}</div></div>
                <div class="detail-row"><div class="detail-label">Payment</div><div class="detail-value">{{ $order->payment_method === 'cod' ? 'Cash on Delivery' : 'Bank Transfer' }} · {{ ucfirst($order->payment_status) }}</div></div>
                <div class="detail-row"><div class="detail-label">Created</div><div class="detail-value">{{ $order->created_at->format('d M Y, h:i A') }}</div></div>
            </div>

            <div class="template-field" id="status-update-form">
                <label for="status">Order Status</label>
                <form method="POST" action="{{ route('orders.status',$order) }}">
                    @csrf @method('PATCH')
                    <div class="template-select">
                        <select id="status" name="status">
                            @foreach(['pending','processing','shipped','delivered','cancelled'] as $status)
                                <option value="{{ $status }}" @selected($order->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="tf-button w-full mt-15" type="submit">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<style>
#print-invoice-header { display: none; }

@media print {
    /* Show invoice header */
    #print-invoice-header { display: block !important; }

    /* Hide chrome */
    .section-menu-left,
    .header-dashboard,
    #action-buttons,
    #status-update-form,
    .form-card-title i,
    .bottom-page,
    .breadcrumbs { display: none !important; }

    /* Full width reset */
    body, html { background: #fff !important; margin: 0 !important; }
    #wrapper, #page, .layout-wrap, .section-content-right,
    .main-content, .main-content-inner {
        display: block !important;
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        box-shadow: none !important;
    }
    .main-content-wrap { padding: 24px !important; }

    /* Invoice layout */
    #page-header { border-bottom: none !important; margin-bottom: 0 !important; }
    #page-header h3 { font-size: 0 !important; } /* hide h3, show print header instead */

    .ecom-detail-grid {
        display: grid !important;
        grid-template-columns: 1.2fr 0.8fr !important;
        gap: 16px !important;
    }
    .form-card {
        box-shadow: none !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 8px !important;
        padding: 16px !important;
    }
    .ecom-order-item { border-bottom: 1px solid #f3f4f6 !important; padding: 8px 0 !important; }
    .summary-total { margin-top: 12px !important; border-top: 1px solid #e5e7eb !important; padding-top: 12px !important; }
    .detail-row { padding: 6px 0 !important; border-bottom: 1px solid #f9fafb !important; }
}
</style>
@endsection
