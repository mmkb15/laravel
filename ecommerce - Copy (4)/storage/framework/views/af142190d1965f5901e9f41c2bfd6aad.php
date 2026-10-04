<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo $__env->yieldContent('title','Home'); ?></title>
  
  <meta name="description" content="Sprylo is a free modern HTML template for tech and electronics stores — multi-color bento hero, indigo primary palette, Plus Jakarta + Outfit + Roboto Mono pair, 5 fully responsive pages, no framework, no build step." />
  <meta name="theme-color" content="#4F46E5" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Outfit:wght@400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" />
  <link rel="stylesheet" href="<?php echo e(asset('frontend-assets/css/styles.css')); ?>" />
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('assets/images/logo/logo.svg')); ?>">
  <?php echo $__env->yieldContent('style'); ?>
</head>

<body>
  <a class="skip-link" href="#main">Skip to content</a>

  <!-- Top utility strip -->
  <div class="utility">
    <div class="container">
      <span class="promo">
        <span class="tag">SALE</span>
        Free shipping on orders over $50 · 30-day returns
      </span>
      <span class="links">
        <a href="#">Track order</a>
        <a href="#">Help</a>
        <a href="#">EN · USD</a>
      </span>
    </div>
  </div>

  <!-- Header -->
  <?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <!-- Category nav -->
  <?php echo $__env->make('frontend.layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <!-- Mobile drawer -->
  <?php echo $__env->make('frontend.layouts.mobile-drawer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <!-- Main -->
  <?php echo $__env->yieldContent('content'); ?>

  <!-- FOOTER -->
    <?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <script src="<?php echo e(asset('frontend-assets/js/main.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>