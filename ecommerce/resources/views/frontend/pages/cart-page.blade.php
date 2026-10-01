@extends('frontend.layouts.master')

@section('title', 'Your Cart')

@section('content')
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="{{ route('home') }}">Home</a> <span class="sep">›</span> <span>Shopping cart</span></div>
      <h1>Your cart</h1>
      <p>{{ $cartItems->sum('quantity') }} item(s) in your cart.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      @if (session('success'))
        <p role="status">{{ session('success') }}</p>
      @endif
      @if (session('error'))
        <p role="alert">{{ session('error') }}</p>
      @endif
      @if ($errors->any())
        <div role="alert">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      @if ($cartItems->isEmpty())
        <div class="cart-summary">
          <h2>Your cart is empty</h2>
          <p>Browse the catalog and add something you like.</p>
          <a href="{{ route('shop') }}" class="btn btn--indigo">Browse products</a>
        </div>
      @else
        <div class="cart-layout">
          <div>
            <div class="cart-list">
              @foreach ($cartItems as $item)
                @php($product = $item['product'])
                <article class="cart-row">
                  <div class="pic"><img src="{{ $product->image_url }}" alt="{{ $product->name }}"></div>
                  <div class="info">
                    <a class="name" href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                    <div class="variant">
                      @if ($product->stock > 0)
                        {{ $product->stock }} available
                      @else
                        Currently out of stock
                      @endif
                    </div>
                  </div>

                  @if ($product->stock > 0)
                    <form class="qty cart-quantity" method="POST" action="{{ route('cart.update', $product->slug) }}">
                      @csrf
                      @method('PUT')
                      <button type="submit" name="step" value="decrease" data-act="-" aria-label="Decrease quantity for {{ $product->name }}" @disabled($item['quantity'] <= 1)>−</button>
                      <input type="text" name="quantity" value="{{ $item['quantity'] }}" inputmode="numeric" pattern="[0-9]*" min="1" max="{{ $product->stock }}" aria-label="Quantity for {{ $product->name }}" required>
                      <button type="submit" name="step" value="increase" data-act="+" aria-label="Increase quantity for {{ $product->name }}" @disabled($item['quantity'] >= $product->stock)>+</button>
                    </form>
                  @else
                    <span>Qty {{ $item['quantity'] }}</span>
                  @endif

                  <span class="subtotal">&#2547;{{ number_format($item['subtotal'], 2) }}</span>
                  <form method="POST" action="{{ route('cart.remove', $product->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button class="remove" type="submit" aria-label="Remove {{ $product->name }}">×</button>
                  </form>
                </article>
              @endforeach
            </div>

            <div style="margin-top: var(--s5)">
              <a href="{{ route('shop') }}" class="btn btn--ghost">Continue shopping</a>
            </div>
          </div>

          <aside class="cart-summary">
            <h2>Order summary</h2>
            <div class="cart-line"><span>Subtotal</span><span>&#2547;{{ number_format($subtotal, 2) }}</span></div>
            <div class="cart-line"><span>Shipping</span><span>Calculated at checkout</span></div>
            <div class="cart-line is-total"><span>Total</span><span>&#2547;{{ number_format($subtotal, 2) }}</span></div>
            <a href="{{ route('checkout') }}" class="btn btn--indigo btn--block">Proceed to checkout</a>
          </aside>
        </div>
      @endif
    </div>
  </section>
</main>
@endsection