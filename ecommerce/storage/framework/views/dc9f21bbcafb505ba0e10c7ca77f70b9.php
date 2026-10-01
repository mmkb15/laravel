

<?php $__env->startSection('title','Home'); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<main id="main">

    <!-- HERO: bento grid -->
    <section class="hero">
      <div class="container">
        <div class="bento">

          <article class="bento-card bento-card--lg">
            <div class="sparkle"></div>
            <div>
              <span class="eyebrow">⚡ Audio &middot; Featured</span>
              <h2>Apple HomePod<br/>2nd Gen Speaker</h2>
              <p>Apple ecosystem with high-quality audio playback while serving as a hub for controlling smart home devices. Spatial audio, room-sensing tech.</p>
              <a href="<?php echo e(route('shop')); ?>" class="btn btn--paper">Shop Now
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <div class="dots"><span class="active"></span><span></span><span></span></div>
            </div>
            <img class="product" src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=900&q=80&auto=format&fit=crop" alt="HomePod speaker" />
          </article>

          <article class="bento-card bento-card--purple">
            <div class="sparkle"></div>
            <span class="eyebrow">Wearables</span>
            <h3 style="font-size:var(--text-xl); line-height:1.15">Explore<br/>Apple Watch</h3>
            <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
              <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=600&q=80&auto=format&fit=crop" alt="Apple Watch" />
          </article>

          <article class="bento-card bento-card--teal">
            <div class="sparkle"></div>
            <span class="eyebrow">Latest Phones</span>
            <h3 style="font-size:var(--text-xl); line-height:1.15">Galaxy S24<br/>Ultra · 5G</h3>
            <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
              <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=600&q=80&auto=format&fit=crop" alt="Samsung Galaxy phone" />
          </article>

          <div class="bento-row">
            <article class="bento-card bento-card--orange">
              <div class="sparkle"></div>
              <span class="eyebrow">Cameras</span>
              <h3 style="font-size:var(--text-lg); line-height:1.2">Samsung<br/>Gear Camera</h3>
              <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
                <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <img class="product" src="https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=500&q=80&auto=format&fit=crop" alt="Camera" />
            </article>

            <article class="bento-card bento-card--green">
              <div class="sparkle"></div>
              <span class="eyebrow">Audio</span>
              <h3 style="font-size:var(--text-lg); line-height:1.2">Beats<br/>Studio Buds</h3>
              <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
                <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <img class="product" src="https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=500&q=80&auto=format&fit=crop" alt="Earbuds" />
            </article>

            <article class="bento-card bento-card--black">
              <div class="sparkle"></div>
              <span class="eyebrow">DSLR</span>
              <h3 style="font-size:var(--text-lg); line-height:1.2">Hero Camera<br/>X-Series</h3>
              <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
                <svg width="12" height="10" viewBox="0 0 14 10" fill="none" aria-hidden="true"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
              <img class="product" src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=500&q=80&auto=format&fit=crop" alt="DSLR camera" />
            </article>
          </div>

        </div>
      </div>
    </section>

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
                <span class="now">&#2547;<?php echo e($product->display_price); ?></span>
                <?php if($product->sale_price !== null): ?>
                  <span class="was">&#2547;<?php echo e(number_format((float) $product->price, 2)); ?></span>
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
            <img class="product" src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=500&q=80&auto=format&fit=crop" alt="Smart watch" />
          </article>
          <article class="discount-card discount-card--airpods">
            <span class="meta">LIMITED EDITION</span>
            <h3>Studio Buds Pro<br/><span class="pct">30% Off</span></h3>
            <a href="<?php echo e(route('shop')); ?>" class="shop-now">Shop Now
              <svg width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <img class="product" src="https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=500&q=80&auto=format&fit=crop" alt="Earbuds" />
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
            <article class="compact-card">
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
                <div class="price">&#2547;<?php echo e($product->display_price); ?></div>
                <a href="<?php echo e(route('product', $product->slug)); ?>" class="btn">View details</a>
              </div>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- BRAND STRIP -->
    <section class="brands">
      <div class="container">
        <div class="brand-row">
          <a href="#" class="brand-logo">HP</a>
          <a href="#" class="brand-logo">Huawei</a>
          <a href="#" class="brand-logo">Nokia</a>
          <a href="#" class="brand-logo">Samsung</a>
          <a href="#" class="brand-logo">Canon</a>
          <a href="#" class="brand-logo">Sony</a>
        </div>
      </div>
    </section>

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