

<?php $__env->startSection('title','Home'); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<main id="main">

    <!-- HERO: bento grid -->
    <?php if($featuredProduct): ?>
    <section class="hero">
      <div class="container">
        <div class="bento">
          <article class="bento-card bento-card--lg">
            <div class="sparkle"></div>
            <div>
              <span class="eyebrow"><?php echo e($featuredProduct->category?->name ?? 'Product'); ?> &middot; Featured</span>
              <h2><?php echo e($featuredProduct->name); ?></h2>
              <a href="<?php echo e(route('product', $featuredProduct->slug)); ?>" class="btn btn--paper">Shop Now
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
            <img class="product" src="<?php echo e(asset('assets/images/products/hero-cutouts/' . $featuredProduct->slug . '.png')); ?>" alt="<?php echo e($featuredProduct->name); ?>" />
          </article>

          <?php $__currentLoopData = $heroProducts->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="bento-card <?php echo e($loop->first ? 'bento-card--purple' : 'bento-card--teal'); ?>">
              <div class="sparkle"></div>
              <span class="eyebrow"><?php echo e($product->category?->name ?? 'Product'); ?></span>
              <h3 style="font-size:var(--text-xl); line-height:1.15; max-width:10ch"><?php echo e($product->name); ?></h3>
              <a href="<?php echo e(route('product', $product->slug)); ?>" class="shop-now">Shop Now
                <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <img class="product" src="<?php echo e(asset('assets/images/products/hero-cutouts/' . $product->slug . '.png')); ?>" alt="<?php echo e($product->name); ?>" />
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php if($heroProducts->count() > 2): ?>
            <div class="bento-row">
              <?php
                $cardClasses = ['bento-card--orange', 'bento-card--green', 'bento-card--black'];
              ?>
              <?php $__currentLoopData = $heroProducts->slice(2, 3)->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bento-card <?php echo e($cardClasses[$loop->index]); ?>">
                  <div class="sparkle"></div>
                  <span class="eyebrow"><?php echo e($product->category?->name ?? 'Product'); ?></span>
                  <h3 style="font-size:var(--text-lg); line-height:1.2; max-width:10ch"><?php echo e($product->name); ?></h3>
                  <a href="<?php echo e(route('product', $product->slug)); ?>" class="shop-now">Shop Now
                    <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </a>
                  <img class="product" src="<?php echo e(asset('assets/images/products/hero-cutouts/' . $product->slug . '.png')); ?>" alt="<?php echo e($product->name); ?>" />
                </article>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- TRENDING PRODUCTS -->
    <section class="section" style="padding-top: var(--s5)">
      <div class="container">
        <div class="section-head">
          <h2>Trending Products</h2>
          <a href="<?php echo e(route('shop')); ?>" class="view-all">View all
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>

        <div class="tabs" role="tablist" aria-label="Filter trending products">
          <button class="tab is-active" type="button" role="tab" aria-selected="true" aria-controls="trending-products" data-category-filter="all">All</button>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="trending-products" data-category-filter="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="products" id="trending-products" data-trending-products>
          <?php $__empty_1 = true; $__currentLoopData = $trendingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="product-card" data-trending-card data-category-slug="<?php echo e($product->category?->slug); ?>" <?php if($loop->iteration > 5): ?> hidden <?php endif; ?>>
              <div class="img-wrap">
                <?php if($product->sale_price !== null): ?>
                  <span class="badge badge--sale">Sale</span>
                <?php else: ?>
                  <span class="badge">New</span>
                <?php endif; ?>
                <button class="wishlist" aria-label="Add <?php echo e($product->name); ?> to wishlist">♡</button>
                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" />
              </div>
              <div class="stock"><span class="dot"></span>
                <?php if($product->stock > 0): ?>
                  In stock · <?php echo e($product->stock); ?> items
                <?php else: ?>
                  Out of stock
                <?php endif; ?>
              </div>
              <a href="<?php echo e(route('product', $product->slug)); ?>" class="name"><?php echo e($product->name); ?></a>
              <div class="price">
                <span class="now">$<?php echo e($product->display_price); ?></span>
                <?php if($product->sale_price !== null): ?>
                  <span class="was">$<?php echo e(number_format((float) $product->price, 2)); ?></span>
                <?php endif; ?>
              </div>
              <button class="btn" type="button" data-add-to-cart data-product-id="<?php echo e($product->id); ?>">Add to cart →</button>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No products are available right now.</p>
          <?php endif; ?>
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
            <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="<?php echo e(asset('assets/images/products/hero-cutouts/samsung-galaxy-watch-7-18.png')); ?>" alt="Samsung Galaxy Watch 7" />
          </article>
          <article class="discount-card discount-card--airpods">
            <span class="meta">LIMITED EDITION</span>
            <h3>Studio Buds Pro<br/><span class="pct">30% Off</span></h3>
            <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="<?php echo e(asset('assets/images/products/hero-cutouts/samsung-galaxy-buds3-pro-16.png')); ?>" alt="Samsung Galaxy Buds3 Pro" />
          </article>
        </div>
      </div>
    </section>

    <!-- CATEGORIES grid -->
    <section class="section" style="padding-top: var(--s5)">
      <div class="container">
        <div class="section-head">
          <h2>Shop by category</h2>
          <a href="<?php echo e(route('shop')); ?>" class="view-all">View all products
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
        <div class="cats-grid">
          <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('shop', ['categories' => [$category->slug]])); ?>" class="cat-tile">
              <div class="pic">
                <img src="<?php echo e($category->image_url ?? asset('assets/images/products/1.png')); ?>" alt="<?php echo e($category->name); ?>" />
              </div>
              <div class="name"><?php echo e($category->name); ?></div>
              <div class="count"><?php echo e($category->products_count); ?> Products</div>
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No product categories are available yet.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- COMPACT row (4 cards in 2x2 layout) -->
    <?php if($justForYouProducts->isNotEmpty()): ?>
    <section class="section" style="padding-top:0">
      <div class="container">
        <div class="section-head">
          <h2>Just for you</h2>
          <a href="<?php echo e(route('shop')); ?>" class="view-all">More picks
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
        </div>
        <div class="compact-row">
          <?php $__currentLoopData = $justForYouProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="compact-card <?php echo e($product->slug === 'hp-wired-rgb-gaming-mouse-11' ? 'compact-card--mouse' : ''); ?>">
              <div class="pic"><img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" /></div>
              <div>
                <div class="stock">
                  <?php if($product->stock > 0): ?>
                    IN STOCK · <?php echo e($product->stock); ?>

                  <?php else: ?>
                    OUT OF STOCK
                  <?php endif; ?>
                </div>
                <div class="name"><?php echo e($product->name); ?></div>
                <div class="price">$<?php echo e($product->display_price); ?></div>
                <a href="<?php echo e(route('product', $product->slug)); ?>" class="btn">View details</a>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- BRAND STRIP -->
    <?php if($brands->isNotEmpty()): ?>
    <section class="brands">
      <div class="container">
        <div class="brand-row">
          <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('shop', ['brands' => [$brand->slug]])); ?>" class="brand-logo" aria-label="Shop <?php echo e($brand->name); ?> products">
              <?php echo e($brand->name); ?>

            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>