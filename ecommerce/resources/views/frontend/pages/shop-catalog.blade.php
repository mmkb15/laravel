@extends('frontend.layouts.master')

@section('title', 'Shop')

@section('content')
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="{{ route('home') }}">Home</a> <span class="sep">›</span> <span>Shop</span></div>
      <h1>Shop products</h1>
      <p>Browse the current catalog and filter by category, brand, and availability.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="shop-layout">
        <form class="filters" method="GET" action="{{ route('shop') }}" aria-label="Product filters">
          <div class="filter-block">
            <h2>Search</h2>
            <label for="catalog-search">Product name</label>
            <input id="catalog-search" type="search" name="search" value="{{ request('search') }}" placeholder="Search products">
          </div>

          <div class="filter-block">
            <h2>Category</h2>
            @foreach ($categories as $category)
              <label>
                <input type="checkbox" name="categories[]" value="{{ $category->slug }}" @checked(in_array($category->slug, $selectedCategories, true))>
                {{ $category->name }} <span class="ct">{{ $category->products_count }}</span>
              </label>
            @endforeach
          </div>

          <div class="filter-block">
            <h2>Price range</h2>
            <div class="price-range-fields">
              <label for="minimum-price">Minimum
                <input id="minimum-price" type="number" name="min_price" min="0" step="0.01" value="{{ request('min_price') }}" placeholder="0">
              </label>
              <label for="maximum-price">Maximum
                <input id="maximum-price" type="number" name="max_price" min="0" step="0.01" value="{{ request('max_price') }}" placeholder="Any">
              </label>
            </div>
          </div>

          <div class="filter-block">
            <h2>Brand</h2>
            @foreach ($brands as $brand)
              <label>
                <input type="checkbox" name="brands[]" value="{{ $brand->slug }}" @checked(in_array($brand->slug, $selectedBrands, true))>
                {{ $brand->name }} <span class="ct">{{ $brand->products_count }}</span>
              </label>
            @endforeach
          </div>

          <div class="filter-block">
            <h2>Availability</h2>
            <label><input type="checkbox" name="in_stock" value="1" @checked(request()->boolean('in_stock'))> In stock</label>
            <label><input type="checkbox" name="on_sale" value="1" @checked(request()->boolean('on_sale'))> On sale</label>
          </div>

          <div class="filter-block">
            <label for="catalog-sort">Sort by</label>
            <select id="catalog-sort" name="sort">
              <option value="newest" @selected(request('sort', 'newest') === 'newest')>Newest</option>
              <option value="price_low" @selected(request('sort') === 'price_low')>Price: low to high</option>
              <option value="price_high" @selected(request('sort') === 'price_high')>Price: high to low</option>
            </select>
          </div>

          <div class="filter-actions">
            <button class="btn btn--indigo btn--block" type="submit">Apply filters</button>
            <a class="btn btn--ghost btn--block" href="{{ route('shop') }}">Clear filters</a>
          </div>
        </form>

        <div>
          <div class="shop-toolbar">
            <span class="count">{{ $products->total() }} product(s)</span>
          </div>

          <div class="shop-grid">
            @forelse ($products as $product)
              <article class="product-card">
                <div class="img-wrap">
                  @if ($product->sale_price !== null)
                    <span class="badge badge--sale">Sale</span>
                  @endif
                  <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                </div>
                <div class="stock"><span class="dot"></span>
                  @if ($product->stock > 0)
                    In stock · {{ $product->stock }} items
                  @else
                    Out of stock
                  @endif
                </div>
                <a href="{{ route('product', $product->slug) }}" class="name">{{ $product->name }}</a>
                @if ($product->brand)
                  <div class="count">{{ $product->brand->name }}</div>
                @endif
                <div class="price">
                  <span class="now">&#2547;{{ $product->display_price }}</span>
                  @if ($product->sale_price !== null)
                    <span class="was">&#2547;{{ number_format((float) $product->price, 2) }}</span>
                  @endif
                </div>
                <a href="{{ route('product', $product->slug) }}" class="btn">View product</a>
              </article>
            @empty
              <p>No products match those filters. Try clearing one or more filters.</p>
            @endforelse
          </div>

          {{ $products->links() }}
        </div>
      </div>
    </div>
  </section>
</main>
@endsection