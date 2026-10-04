

<?php $__env->startSection('title', 'Shop'); ?>

<?php $__env->startSection('content'); ?>
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="sep">›</span> <span>Shop</span></div>
      <h1>Shop products</h1>
      <p>Browse the current catalog and filter by category, brand, and availability.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="shop-layout">
        <form class="filters" method="GET" action="<?php echo e(route('shop')); ?>" aria-label="Product filters">
          <div class="filter-block">
            <h2>Search</h2>
            <label for="catalog-search">Product name</label>
            <input id="catalog-search" type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search products">
          </div>

          <div class="filter-block">
            <h2>Category</h2>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <label>
                <input type="checkbox" name="categories[]" value="<?php echo e($category->slug); ?>" <?php if(in_array($category->slug, $selectedCategories, true)): echo 'checked'; endif; ?>>
                <?php echo e($category->name); ?> <span class="ct"><?php echo e($category->products_count); ?></span>
              </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="filter-block">
            <h2>Price range</h2>
            <div class="price-range-fields">
              <label for="minimum-price">Minimum
                <input id="minimum-price" type="number" name="min_price" min="0" step="0.01" value="<?php echo e(request('min_price')); ?>" placeholder="0">
              </label>
              <label for="maximum-price">Maximum
                <input id="maximum-price" type="number" name="max_price" min="0" step="0.01" value="<?php echo e(request('max_price')); ?>" placeholder="Any">
              </label>
            </div>
          </div>

          <div class="filter-block">
            <h2>Brand</h2>
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <label>
                <input type="checkbox" name="brands[]" value="<?php echo e($brand->slug); ?>" <?php if(in_array($brand->slug, $selectedBrands, true)): echo 'checked'; endif; ?>>
                <?php echo e($brand->name); ?> <span class="ct"><?php echo e($brand->products_count); ?></span>
              </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <div class="filter-block">
            <h2>Availability</h2>
            <label><input type="checkbox" name="in_stock" value="1" <?php if(request()->boolean('in_stock')): echo 'checked'; endif; ?>> In stock</label>
            <label><input type="checkbox" name="on_sale" value="1" <?php if(request()->boolean('on_sale')): echo 'checked'; endif; ?>> On sale</label>
          </div>

          <div class="filter-block">
            <label for="catalog-sort">Sort by</label>
            <select id="catalog-sort" name="sort">
              <option value="newest" <?php if(request('sort', 'newest') === 'newest'): echo 'selected'; endif; ?>>Newest</option>
              <option value="price_low" <?php if(request('sort') === 'price_low'): echo 'selected'; endif; ?>>Price: low to high</option>
              <option value="price_high" <?php if(request('sort') === 'price_high'): echo 'selected'; endif; ?>>Price: high to low</option>
            </select>
          </div>

          <div class="filter-actions">
            <button class="btn btn--indigo btn--block" type="submit">Apply filters</button>
            <a class="btn btn--ghost btn--block" href="<?php echo e(route('shop')); ?>">Clear filters</a>
          </div>
        </form>

        <div>
          <div class="shop-toolbar">
            <span class="count"><?php echo e($products->total()); ?> product(s)</span>
          </div>

          <div class="shop-grid">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <article class="product-card">
                <div class="img-wrap">
                  <?php if($product->sale_price !== null): ?>
                    <span class="badge badge--sale">Sale</span>
                  <?php endif; ?>
                  <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>">
                </div>
                <div class="stock"><span class="dot"></span>
                  <?php if($product->stock > 0): ?>
                    In stock · <?php echo e($product->stock); ?> items
                  <?php else: ?>
                    Out of stock
                  <?php endif; ?>
                </div>
                <a href="<?php echo e(route('product', $product->slug)); ?>" class="name"><?php echo e($product->name); ?></a>
                <?php if($product->brand): ?>
                  <div class="count"><?php echo e($product->brand->name); ?></div>
                <?php endif; ?>
                <div class="price">
                  <span class="now">&#2547;<?php echo e($product->display_price); ?></span>
                  <?php if($product->sale_price !== null): ?>
                    <span class="was">&#2547;<?php echo e(number_format((float) $product->price, 2)); ?></span>
                  <?php endif; ?>
                </div>
                <a href="<?php echo e(route('product', $product->slug)); ?>" class="btn">View product</a>
              </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <p>No products match those filters. Try clearing one or more filters.</p>
            <?php endif; ?>
          </div>

          <?php echo e($products->links()); ?>

        </div>
      </div>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views\frontend\pages\shop-catalog.blade.php ENDPATH**/ ?>