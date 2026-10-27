@extends('frontend.layouts.master')

@section('title', 'Your Cart')

@section('content')
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="{{ route('home') }}">Home</a> <span class="sep">›</span> <span>Shopping cart</span></div>
      <h1>Your cart</h1>
      <p data-cart-item-count>0 items in your cart.</p>
    </div>
  </section>

  <section class="section">
    <div class="container" data-cart-page data-products-url="{{ route('cart.products') }}" data-show-checkout="{{ $errors->any() ? '1' : '0' }}">
      @if (session('success'))
        <p role="status">{{ session('success') }}</p>
      @endif
      <p class="cart-message" role="alert" data-cart-message hidden></p>

      <div class="cart-layout" data-cart-view>
        <div>
          <div class="cart-list" data-cart-items></div>
          <div class="cart-empty" data-cart-empty hidden>
            <h2>Your cart is empty</h2>
            <p>Browse the catalog and add something you like.</p>
            <a href="{{ route('shop') }}" class="btn btn--indigo">Browse products</a>
          </div>
          <div style="margin-top: var(--s5)">
            <a href="{{ route('shop') }}" class="btn btn--ghost">Continue shopping</a>
          </div>
        </div>

        <aside class="cart-summary" data-cart-summary>
          <h2>Order summary</h2>
          <div class="cart-line"><span>Subtotal</span><span data-cart-subtotal>$0.00</span></div>
          <div class="cart-line"><span>Shipping</span><span>Calculated at checkout</span></div>
          <div class="cart-line is-total"><span>Total</span><span data-cart-total>$0.00</span></div>
          <button type="button" class="btn btn--indigo btn--block" data-open-checkout>Proceed to checkout</button>
        </aside>
      </div>

      <section class="checkout-layout checkout-single-page" data-checkout-view hidden>
        <form method="POST" action="{{ route('checkout.store') }}" class="contact-form checkout-form" data-checkout-form>
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

          <div data-checkout-items></div>
          <div class="checkout-actions">
            <button type="button" class="btn btn--ghost" data-back-to-cart>Back to cart</button>
            <button class="btn btn--indigo" type="submit">Place order</button>
          </div>
        </form>

        <aside class="cart-summary">
          <h2>Order summary</h2>
          <div data-checkout-summary></div>
          <div class="cart-line"><span>Shipping</span><span>Free</span></div>
          <div class="cart-line is-total"><span>Total</span><span data-checkout-total>$0.00</span></div>
        </aside>
      </section>
    </div>
  </section>
</main>
@endsection