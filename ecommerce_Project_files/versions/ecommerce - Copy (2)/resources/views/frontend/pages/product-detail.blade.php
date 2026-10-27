@extends('frontend.layouts.master')

@section('title', $product->name)

@section('content')
@php($selectedImage = $product->images->firstWhere('is_primary', true) ?? $product->images->first())
<main id="main">
  <div class="container">
    <div class="crumbs" style="padding-top: var(--s5)">
      <a href="{{ route('home') }}">Home</a> <span class="sep">›</span>
      <a href="{{ route('shop') }}">Shop</a> <span class="sep">›</span>
      <span>{{ $product->name }}</span>
    </div>

    <section class="product-detail">
      <div class="gallery">
        <div class="gallery-thumbs">
          @forelse ($product->images as $image)
            <button type="button" @if ($selectedImage?->id === $image->id) class="is-active" @endif aria-label="View image {{ $loop->iteration }}">
              <img src="{{ $image->url }}" alt="{{ $product->name }}">
            </button>
          @empty
            <button type="button" class="is-active" aria-label="Product image">
              <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
            </button>
          @endforelse
        </div>
        <figure class="gallery-main">
          <img src="{{ $selectedImage?->url ?? $product->image_url }}" alt="{{ $product->name }}">
        </figure>
      </div>

      <div class="pdp-info">
        <span class="pdp-cat">
          {{ $product->category->name }}
          @if ($product->brand)
            · {{ $product->brand->name }}
          @endif
        </span>
        <h1>{{ $product->name }}</h1>
        <div class="rating-row">
          <span>SKU: {{ $product->sku }}</span>
          <span style="color: var(--rule-strong)">|</span>
          @if ($product->stock > 0)
            <span style="color: var(--emerald)">In stock · {{ $product->stock }} items</span>
          @else
            <span style="color: var(--rose)">Out of stock</span>
          @endif
        </div>

        @if ($product->description)
          <p class="desc">{{ $product->description }}</p>
        @endif

        <div class="price-row">
          <span class="now">&#2547;{{ $product->display_price }}</span>
          @if ($product->sale_price !== null)
            <span class="was">&#2547;{{ number_format((float) $product->price, 2) }}</span>
          @endif
        </div>

        @if ($product->stock > 0)
          <form method="POST" action="{{ route('cart.add', $product->slug) }}" class="pdp-cta">
            @csrf
            <div class="qty">
              <button type="button" data-act="-" aria-label="Decrease quantity">−</button>
              <label class="sr-only" for="product-quantity">Quantity</label>
              <input id="product-quantity" type="text" name="quantity" value="1" inputmode="numeric" pattern="[0-9]*" min="1" max="{{ $product->stock }}" required>
              <button type="button" data-act="+" aria-label="Increase quantity">+</button>
            </div>
            <button type="submit" class="btn btn--indigo" style="flex:1; min-width:160px">Add to cart</button>
            <a href="{{ route('shop') }}" class="btn btn--ink">Continue shopping</a>
          </form>
        @else
          <p role="status">This product is currently unavailable.</p>
        @endif

        @if ($errors->has('quantity'))
          <p role="alert">{{ $errors->first('quantity') }}</p>
        @endif

        <div class="pdp-features">
          <div class="pf"><span class="ic">✓</span><span>Secure order processing</span></div>
          <div class="pf"><span class="ic">↺</span><span>Contact us for return support</span></div>
        </div>
      </div>
    </section>

    @if ($relatedProducts->isNotEmpty())
      <section class="section">
        <div class="section-head">
          <h2>More in {{ $product->category->name }}</h2>
          <a href="{{ route('shop', ['categories' => [$product->category->slug]]) }}" class="view-all">View category</a>
        </div>
        <div class="products">
          @foreach ($relatedProducts as $relatedProduct)
            <article class="product-card">
              <div class="img-wrap">
                <img src="{{ $relatedProduct->image_url }}" alt="{{ $relatedProduct->name }}">
              </div>
              <div class="stock"><span class="dot"></span>
                @if ($relatedProduct->stock > 0)
                  In stock · {{ $relatedProduct->stock }} items
                @else
                  Out of stock
                @endif
              </div>
              <a href="{{ route('product', $relatedProduct->slug) }}" class="name">{{ $relatedProduct->name }}</a>
              <div class="price"><span class="now">&#2547;{{ $relatedProduct->display_price }}</span></div>
              <a href="{{ route('product', $relatedProduct->slug) }}" class="btn">View product</a>
            </article>
          @endforeach
        </div>
      </section>
    @endif
  </div>
</main>
@endsection