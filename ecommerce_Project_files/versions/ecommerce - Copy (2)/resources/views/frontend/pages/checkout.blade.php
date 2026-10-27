@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('content')
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="{{ route('home') }}">Home</a> <span class="sep">›</span> <a href="{{ route('cart') }}">Cart</a> <span class="sep">›</span> <span>Checkout</span></div>
      <h1>Checkout</h1>
      <p>Enter your delivery details to place your order.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cart-layout checkout-layout">
        <form method="POST" action="{{ route('checkout.store') }}" class="contact-form checkout-form">
          @csrf
          @if ($errors->any())
            <div role="alert" class="checkout-errors">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <h2 class="checkout-section-title">Delivery details</h2>
          <div class="field-row">
            <div class="field">
              <label for="shipping-name">Full name</label>
              <input id="shipping-name" name="shipping_name" value="{{ old('shipping_name') }}" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="shipping-phone">Phone number</label>
              <input id="shipping-phone" name="shipping_phone" value="{{ old('shipping_phone') }}" autocomplete="tel" required>
            </div>
          </div>

          <div class="field">
            <label for="shipping-address">Delivery address</label>
            <textarea id="shipping-address" name="shipping_address" rows="4" autocomplete="street-address" required>{{ old('shipping_address') }}</textarea>
          </div>

          <div class="field">
            <label for="order-notes">Order notes (optional)</label>
            <textarea id="order-notes" name="notes" rows="3">{{ old('notes') }}</textarea>
          </div>

          <div class="field checkout-payment">
            <div class="checkout-section-title">Payment method</div>
            <label class="checkout-payment-option"><input type="radio" name="payment_method" value="cod" @checked(old('payment_method', 'cod') === 'cod') required> Cash on delivery</label>
            <label class="checkout-payment-option"><input type="radio" name="payment_method" value="bank" @checked(old('payment_method') === 'bank')> Bank transfer</label>
          </div>

          <button class="btn btn--indigo btn--block" type="submit">Place order</button>
        </form>

        <aside class="cart-summary">
          <h2>Order summary</h2>
          @foreach ($cartItems as $item)
            <div class="cart-line">
              <span>{{ $item['product']->name }} × {{ $item['quantity'] }}</span>
              <span>&#2547;{{ number_format($item['subtotal'], 2) }}</span>
            </div>
          @endforeach
          <div class="cart-line"><span>Shipping</span><span>Free</span></div>
          <div class="cart-line is-total"><span>Total</span><span>&#2547;{{ number_format($subtotal, 2) }}</span></div>
        </aside>
      </div>
    </div>
  </section>
</main>
@endsection