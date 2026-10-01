  <div class="drawer" id="drawer" aria-hidden="true">
    <div class="drawer-head">
      <a href="{{ route('home') }}" class="brand"><span class="brand-mark">C</span> Carto</a>
      <button class="drawer-close" aria-label="Close menu">Close ✕</button>
    </div>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('shop') }}">Shop</a>
    <a href="{{ route('cart') }}">Cart</a>
    <a href="{{ route('contact') }}">Contact</a>
    <a href="{{ route('cart') }}" class="btn btn--indigo" style="margin-top:var(--s5); justify-content:center">View cart →</a>
  </div>