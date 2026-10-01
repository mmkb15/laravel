  <header class="site-header">
    <div class="container">
      <a href="<?php echo e(route('home')); ?>" class="brand">
        <span class="brand-mark">C</span>
        Carto
      </a>

      <form class="search" role="search" method="GET" action="<?php echo e(route('shop')); ?>">
        <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search products…" aria-label="Search the store" />
        <button type="submit" aria-label="Search">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
        </button>
      </form>

      <div class="icon-row">
        <a href="<?php echo e(route('profile')); ?>" class="icon-btn" aria-label="Account">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 4-7 8-7s8 3 8 7"/></svg>
        </a>
        <a href="<?php echo e(route('cart')); ?>" class="icon-btn icon-btn--cart" aria-label="Cart">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2l-2 5v13a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7l-2-5z"/><path d="M4 7h16"/><path d="M16 11a4 4 0 0 1-8 0"/></svg>
          <span class="count"><?php echo e(array_sum(session('cart', []))); ?></span>
        </a>
        <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">≡</button>
      </div>
    </div>
  </header><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>