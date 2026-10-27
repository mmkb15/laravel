  <nav class="nav-bar" aria-label="Primary">
    <div class="container">
      <a href="{{ route('shop') }}" class="all-cats">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        All Categories
      </a>
      <div class="main-nav">
        <a href="{{ route('home') }}" aria-current="page">Home</a>
        <a href="{{ route('shop') }}">Shop ▾</a>
        <a href="{{ route('product') }}">Products</a>
        <a href="{{ route('cart') }}">Cart</a>
        <a href="{{ route('contact') }}">Contact</a>
      </div>
      <span class="nav-cta">UP TO <strong>60% OFF</strong> ALL ITEMS</span>
    </div>
  </nav>
