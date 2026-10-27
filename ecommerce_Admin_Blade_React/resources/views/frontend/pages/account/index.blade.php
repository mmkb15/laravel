@extends('frontend.layouts.master')

@section('title', 'My Account')

@section('content')
<main id="main" class="account-page">
    <div class="container">
        <div class="account-heading">
            <div>
                <p class="account-eyebrow">Your Carto account</p>
                <h1>Welcome, {{ $customer->name }}</h1>
                <p>Review your orders and keep your contact details up to date.</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="account-secondary-button" type="submit">Sign out</button>
            </form>
        </div>

        @if(session('success'))
            <div class="account-notice" role="status">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="account-notice error" role="alert">{{ $errors->first() }}</div>
        @endif

        <div class="account-grid">
            <section class="account-card">
                <div class="account-card-heading">
                    <div>
                        <p class="account-eyebrow">Purchase history</p>
                        <h2>Your orders</h2>
                    </div>
                    <span class="account-count">{{ $orders->total() }}</span>
                </div>
                <div class="account-orders">
                    @forelse($orders as $order)
                        <a class="account-order" href="{{ route('account.orders.show', $order) }}">
                            <span class="account-order-main">
                                <strong>{{ $order->order_number }}</strong>
                                <small>{{ $order->created_at->format('d M Y') }}</small>
                            </span>
                            <span class="account-order-status {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                            <strong class="account-order-total">${{ number_format($order->total, 2) }}</strong>
                            <span aria-hidden="true" class="account-order-arrow">›</span>
                        </a>
                    @empty
                        <div class="account-empty">
                            <h3>No orders yet</h3>
                            <p>Your purchases will appear here after checkout.</p>
                            <a href="{{ route('shop') }}" class="account-primary-button">Explore products</a>
                        </div>
                    @endforelse
                </div>
                @if($orders->hasPages())
                    <div class="account-pagination">{{ $orders->links() }}</div>
                @endif
            </section>

            <section class="account-card">
                <div class="account-card-heading">
                    <div>
                        <p class="account-eyebrow">Personal details</p>
                        <h2>Your information</h2>
                    </div>
                </div>
                <form class="account-profile-form" method="POST" action="{{ route('account.profile.update') }}">
                    @csrf
                    @method('PUT')
                    <label for="account-name">Full name</label>
                    <input id="account-name" name="name" value="{{ old('name', $customer->name) }}" autocomplete="name" required>
                    <label for="account-email">Email address</label>
                    <input id="account-email" value="{{ $customer->email }}" disabled>
                    <label for="account-phone">Phone</label>
                    <input id="account-phone" name="phone" value="{{ old('phone', $customer->phone) }}" autocomplete="tel">
                    <label for="account-address">Shipping address</label>
                    <textarea id="account-address" name="address" rows="4" autocomplete="street-address">{{ old('address', $customer->address) }}</textarea>
                    <button class="account-primary-button" type="submit">Save details</button>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection

@section('style')
<style>
    .account-page { padding: 48px 0 80px; color: #172033; }
    .account-page .container { max-width: 1180px; }
    .account-heading, .account-card-heading { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
    .account-heading { margin-bottom: 28px; }
    .account-heading h1 { margin: 4px 0 8px; font-size: clamp(28px, 4vw, 38px); }
    .account-heading p, .account-empty p { color: #64748b; }
    .account-eyebrow { margin: 0; color: #5145e5; font-size: 12px; font-weight: 700; letter-spacing: .09em; text-transform: uppercase; }
    .account-grid { display: grid; grid-template-columns: minmax(0, 1.5fr) minmax(280px, .8fr); gap: 22px; align-items: start; }
    .account-card { overflow: hidden; border: 1px solid #e5eaf2; border-radius: 18px; background: #fff; box-shadow: 0 12px 36px #15233b0a; }
    .account-card-heading { min-height: 82px; padding: 18px 22px; border-bottom: 1px solid #edf0f5; }
    .account-card-heading h2 { margin: 4px 0 0; font-size: 20px; }
    .account-count { display: grid; width: 36px; height: 36px; place-items: center; border-radius: 50%; background: #f0efff; color: #5145e5; font-weight: 700; }
    .account-order { display: grid; grid-template-columns: minmax(120px, 1fr) auto auto 16px; align-items: center; gap: 16px; padding: 18px 22px; border-bottom: 1px solid #edf0f5; color: inherit; text-decoration: none; transition: background .18s ease; }
    .account-order:hover { background: #f8f9ff; }
    .account-order-main { display: grid; gap: 5px; min-width: 0; }
    .account-order-main strong { overflow: hidden; text-overflow: ellipsis; }
    .account-order-main small { color: #788499; }
    .account-order-status { padding: 5px 9px; border-radius: 20px; background: #f1f5f9; color: #475569; font-size: 12px; }
    .account-order-status.delivered { background: #e9f9f0; color: #16834b; }
    .account-order-status.cancelled { background: #fff0f0; color: #c43d3d; }
    .account-order-status.pending { background: #fff7e6; color: #a96500; }
    .account-order-total { white-space: nowrap; }
    .account-order-arrow { color: #8591a4; font-size: 24px; }
    .account-empty { padding: 40px 24px; text-align: center; }
    .account-empty h3 { margin: 0 0 8px; }
    .account-profile-form { display: grid; gap: 10px; padding: 22px; }
    .account-profile-form label { margin-top: 6px; font-size: 13px; font-weight: 700; }
    .account-profile-form input, .account-profile-form textarea { width: 100%; padding: 12px 13px; border: 1px solid #e1e7ef; border-radius: 9px; background: #fff; color: #172033; font: inherit; }
    .account-profile-form input:disabled { background: #f6f8fb; color: #64748b; }
    .account-primary-button, .account-secondary-button { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 0 17px; border: 0; border-radius: 9px; font: inherit; font-weight: 700; text-decoration: none; cursor: pointer; }
    .account-primary-button { margin-top: 8px; background: #5145e5; color: white; }
    .account-primary-button:hover { background: #4136cc; color: white; }
    .account-secondary-button { border: 1px solid #e1e7ef; background: white; color: #263449; }
    .account-notice { margin-bottom: 18px; padding: 13px 16px; border: 1px solid #b8e6c9; border-radius: 10px; background: #effbf3; color: #166534; }
    .account-notice.error { border-color: #ffc9c9; background: #fff4f4; color: #b42318; }
    .account-pagination { padding: 18px 22px; }
    @media (max-width: 760px) { .account-grid { grid-template-columns: 1fr; } .account-heading { align-items: flex-start; } .account-order { grid-template-columns: minmax(100px, 1fr) auto 16px; gap: 10px; padding: 15px; } .account-order-total { grid-column: 1; } .account-order-arrow { grid-column: 3; grid-row: 1 / span 2; } }
</style>
@endsection
