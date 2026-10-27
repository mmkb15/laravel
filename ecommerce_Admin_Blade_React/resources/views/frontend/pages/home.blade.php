@extends('frontend.layouts.master')

@section('title','Home')

@section('style')
@endsection


@section('content')
<main id="main">

    <!-- HERO: bento grid -->
    @if ($featuredProduct)
    <section class="hero">
      <div class="container">
        <div class="bento">
          <article class="bento-card bento-card--lg">
            <div class="sparkle"></div>
            <div>
              <span class="eyebrow">{{ $featuredProduct->category?->name ?? 'Product' }} &middot; Featured</span>
              <h2>{{ $featuredProduct->name }}</h2>
              <a href="{{ route('product', $featuredProduct->slug) }}" class="btn btn--paper">Shop Now
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
            <img class="product" src="{{ asset('assets/images/products/hero-cutouts/' . $featuredProduct->slug . '.png') }}" alt="{{ $featuredProduct->name }}" />
          </article>

          @foreach ($heroProducts->take(2) as $product)
            <article class="bento-card {{ $loop->first ? 'bento-card--purple' : 'bento-card--teal' }}">
              <div class="sparkle"></div>
              <span class="eyebrow">{{ $product->category?->name ?? 'Product' }}</span>
              <h3 style="font-size:var(--text-xl); line-height:1.15; max-width:10ch">{{ $product->name }}</h3>
              <a href="{{ route('product', $product->slug) }}" class="shop-now">Shop Now
                <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <img class="product" src="{{ asset('assets/images/products/hero-cutouts/' . $product->slug . '.png') }}" alt="{{ $product->name }}" />
            </article>
          @endforeach

          @if ($heroProducts->count() > 2)
            <div class="bento-row">
              @php
                $cardClasses = ['bento-card--orange', 'bento-card--green', 'bento-card--black'];
              @endphp
              @foreach ($heroProducts->slice(2, 3)->values() as $product)
                <article class="bento-card {{ $cardClasses[$loop->index] }}">
                  <div class="sparkle"></div>
                  <span class="eyebrow">{{ $product->category?->name ?? 'Product' }}</span>
                  <h3 style="font-size:var(--text-lg); line-height:1.2; max-width:10ch">{{ $product->name }}</h3>
                  <a href="{{ route('product', $product->slug) }}" class="shop-now">Shop Now
                    <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </a>
                  <img class="product" src="{{ asset('assets/images/products/hero-cutouts/' . $product->slug . '.png') }}" alt="{{ $product->name }}" />
                </article>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </section>
    @endif

    <!-- TRENDING PRODUCTS -->
    <section class="section" style="padding-top: var(--s5)">
      <div class="container">
        <div class="section-head">
          <h2>Trending Products</h2>
          <a href="{{ route('shop') }}" class="view-all">View all
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>

        <div class="tabs" role="tablist" aria-label="Filter trending products">
          <button class="tab is-active" type="button" role="tab" aria-selected="true" aria-controls="trending-products" data-category-filter="all">All</button>
          @foreach ($categories as $category)
            <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="trending-products" data-category-filter="{{ $category->slug }}">{{ $category->name }}</button>
          @endforeach
        </div>

        <div class="products" id="trending-products" data-trending-products>
          @forelse ($trendingProducts as $product)
            <article class="product-card" data-trending-card data-category-slug="{{ $product->category?->slug }}" @if ($loop->iteration > 5) hidden @endif>
              <div class="img-wrap">
                @if ($product->sale_price !== null)
                  <span class="badge badge--sale">Sale</span>
                @else
                  <span class="badge">New</span>
                @endif
                <button class="wishlist" aria-label="Add {{ $product->name }} to wishlist">♡</button>
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" />
              </div>
              <div class="stock"><span class="dot"></span>
                @if ($product->stock > 0)
                  In stock · {{ $product->stock }} items
                @else
                  Out of stock
                @endif
              </div>
              <a href="{{ route('product', $product->slug) }}" class="name">{{ $product->name }}</a>
              <div class="price">
                <span class="now">${{ $product->display_price }}</span>
                @if ($product->sale_price !== null)
                  <span class="was">${{ number_format((float) $product->price, 2) }}</span>
                @endif
              </div>
              <button class="btn" type="button" data-add-to-cart data-product-id="{{ $product->id }}">Add to cart →</button>
            </article>
          @empty
            <p>No products are available right now.</p>
          @endforelse
        </div>
        <p class="trending-empty" data-trending-empty hidden>No products are available in this category yet.</p>
      </div>
    </section>

    <!-- DISCOUNT BANNERS -->
    <section class="section" style="padding-top:0">
      <div class="container">
        <div class="discount-row">
          <article class="discount-card discount-card--watch">
            <span class="meta">THIS WEEK ONLY</span>
            <h3>Mega Discounts<br/><span class="pct">50% Off</span></h3>
            <a href="{{ route('shop') }}" class="shop-now">Shop Now
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="{{ asset('assets/images/products/hero-cutouts/samsung-galaxy-watch-7-18.png') }}" alt="Samsung Galaxy Watch 7" />
          </article>
          <article class="discount-card discount-card--airpods">
            <span class="meta">LIMITED EDITION</span>
            <h3>Studio Buds Pro<br/><span class="pct">30% Off</span></h3>
            <a href="{{ route('shop') }}" class="shop-now">Shop Now
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="{{ asset('assets/images/products/hero-cutouts/samsung-galaxy-buds3-pro-16.png') }}" alt="Samsung Galaxy Buds3 Pro" />
          </article>
        </div>
      </div>
    </section>

    <!-- CATEGORIES grid -->
    <section class="section" style="padding-top: var(--s5)">
      <div class="container">
        <div class="section-head">
          <h2>Shop by category</h2>
          <a href="{{ route('shop') }}" class="view-all">View all products
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
        <div class="cats-grid">
          @forelse ($categories as $category)
            <a href="{{ route('shop', ['categories' => [$category->slug]]) }}" class="cat-tile">
              <div class="pic">
                <img src="{{ $category->image_url ?? asset('assets/images/products/1.png') }}" alt="{{ $category->name }}" />
              </div>
              <div class="name">{{ $category->name }}</div>
              <div class="count">{{ $category->products_count }} Products</div>
            </a>
          @empty
            <p>No product categories are available yet.</p>
          @endforelse
        </div>
      </div>
    </section>

    <!-- COMPACT row (4 cards in 2x2 layout) -->
    @if ($justForYouProducts->isNotEmpty())
    <section class="section" style="padding-top:0">
      <div class="container">
        <div class="section-head">
          <h2>Just for you</h2>
          <a href="{{ route('shop') }}" class="view-all">More picks
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
        <div class="compact-row">
          @foreach ($justForYouProducts as $product)
            <article class="compact-card {{ $product->slug === 'hp-wired-rgb-gaming-mouse-11' ? 'compact-card--mouse' : '' }}">
              <div class="pic"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" /></div>
              <div>
                <div class="stock">
                  @if ($product->stock > 0)
                    IN STOCK · {{ $product->stock }}
                  @else
                    OUT OF STOCK
                  @endif
                </div>
                <div class="name">{{ $product->name }}</div>
                <div class="price">${{ $product->display_price }}</div>
                <a href="{{ route('product', $product->slug) }}" class="btn">View details</a>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    <!-- BRAND STRIP -->
    @if ($brands->isNotEmpty())
    <section class="brands">
      <div class="container">
        <div class="brand-row">
          @foreach ($brands as $brand)
            <a href="{{ route('shop', ['brands' => [$brand->slug]]) }}" class="brand-logo" aria-label="Shop {{ $brand->name }} products">
              {{ $brand->name }}
            </a>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    <!-- NEWSLETTER -->
    <section style="background: var(--paper)">
      <div class="container">
        <div class="newsletter">
          <div class="newsletter-grid">
            <div>
              <h2>Get <strong>20% Off</strong> your first order — straight to your inbox.</h2>
              <p>Drop your email and we'll send a one-time discount, plus first-look offers on the gear we just got in. Unsubscribe anytime.</p>
            </div>
            <form class="newsletter-form" onsubmit="event.preventDefault(); this.querySelector('button').textContent='Sent ✓';">
              <input type="email" required placeholder="Enter your email" aria-label="Email address" />
              <button class="btn" type="submit">Subscribe →</button>
            </form>
          </div>
        </div>
      </div>
    </section>

</main>
@endsection

@section('script')
@endsection
