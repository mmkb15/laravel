

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<?php ($selectedImage = $product->images->firstWhere('is_primary', true) ?? $product->images->first()); ?>
<main id="main">
  <div class="container">
    <div class="crumbs" style="padding-top: var(--s5)">
      <a href="<?php echo e(route('home')); ?>">Home</a> <span class="sep">›</span>
      <a href="<?php echo e(route('shop')); ?>">Shop</a> <span class="sep">›</span>
      <span><?php echo e($product->name); ?></span>
    </div>

    <section class="product-detail">
      <div class="gallery">
        <div class="gallery-thumbs">
          <?php $__empty_1 = true; $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <button type="button" <?php if($selectedImage?->id === $image->id): ?> class="is-active" <?php endif; ?> aria-label="View image <?php echo e($loop->iteration); ?>">
              <img src="<?php echo e($image->url); ?>" alt="<?php echo e($product->name); ?>">
            </button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <button type="button" class="is-active" aria-label="Product image">
              <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>">
            </button>
          <?php endif; ?>
        </div>
        <figure class="gallery-main">
          <img src="<?php echo e($selectedImage?->url ?? $product->image_url); ?>" alt="<?php echo e($product->name); ?>">
        </figure>
      </div>

      <div class="pdp-info">
        <span class="pdp-cat">
          <?php echo e($product->category->name); ?>

          <?php if($product->brand): ?>
            · <?php echo e($product->brand->name); ?>

          <?php endif; ?>
        </span>
        <h1><?php echo e($product->name); ?></h1>
        <div class="rating-row">
          <span>SKU: <?php echo e($product->sku); ?></span>
          <span style="color: var(--rule-strong)">|</span>
          <?php if($product->stock > 0): ?>
            <span style="color: var(--emerald)">In stock · <?php echo e($product->stock); ?> items</span>
          <?php else: ?>
            <span style="color: var(--rose)">Out of stock</span>
          <?php endif; ?>
        </div>

        <?php if($product->description): ?>
          <p class="desc"><?php echo e($product->description); ?></p>
        <?php endif; ?>

        <div class="price-row">
          <span class="now">$<?php echo e($product->display_price); ?></span>
          <?php if($product->sale_price !== null): ?>
            <span class="was">$<?php echo e(number_format((float) $product->price, 2)); ?></span>
          <?php endif; ?>
        </div>

        <?php if($product->stock > 0): ?>
          <div class="pdp-cta" data-product-purchase data-product-id="<?php echo e($product->id); ?>">
            <div class="qty">
              <button type="button" data-act="-" aria-label="Decrease quantity">−</button>
              <label class="sr-only" for="product-quantity">Quantity</label>
              <input id="product-quantity" type="text" name="quantity" value="1" inputmode="numeric" pattern="[0-9]*" min="1" max="<?php echo e($product->stock); ?>" required>
              <button type="button" data-act="+" aria-label="Increase quantity">+</button>
            </div>
            <button type="button" class="btn btn--indigo" data-add-to-cart style="flex:1; min-width:160px">Add to cart</button>
            <a href="<?php echo e(route('shop')); ?>" class="btn btn--ink">Continue shopping</a>
          </div>
        <?php else: ?>
          <p role="status">This product is currently unavailable.</p>
        <?php endif; ?>

        <?php if($errors->has('quantity')): ?>
          <p role="alert"><?php echo e($errors->first('quantity')); ?></p>
        <?php endif; ?>

        <div class="pdp-features">
          <div class="pf"><span class="ic">✓</span><span>Secure order processing</span></div>
          <div class="pf"><span class="ic">↺</span><span>Contact us for return support</span></div>
        </div>
      </div>
    </section>

    <?php if($relatedProducts->isNotEmpty()): ?>
      <section class="section">
        <div class="section-head">
          <h2>More in <?php echo e($product->category->name); ?></h2>
          <a href="<?php echo e(route('shop', ['categories' => [$product->category->slug]])); ?>" class="view-all">View category</a>
        </div>
        <div class="products">
          <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="product-card">
              <div class="img-wrap">
                <img src="<?php echo e($relatedProduct->image_url); ?>" alt="<?php echo e($relatedProduct->name); ?>">
              </div>
              <div class="stock"><span class="dot"></span>
                <?php if($relatedProduct->stock > 0): ?>
                  In stock · <?php echo e($relatedProduct->stock); ?> items
                <?php else: ?>
                  Out of stock
                <?php endif; ?>
              </div>
              <a href="<?php echo e(route('product', $relatedProduct->slug)); ?>" class="name"><?php echo e($relatedProduct->name); ?></a>
              <div class="price"><span class="now">$<?php echo e($relatedProduct->display_price); ?></span></div>
              <a href="<?php echo e(route('product', $relatedProduct->slug)); ?>" class="btn">View product</a>
            </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </section>
    <?php endif; ?>
  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/pages/product-detail.blade.php ENDPATH**/ ?>