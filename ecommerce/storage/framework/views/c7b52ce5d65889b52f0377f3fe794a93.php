

<?php $__env->startSection('title', 'Your Cart'); ?>

<?php $__env->startSection('content'); ?>
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="sep">›</span> <span>Shopping cart</span></div>
      <h1>Your cart</h1>
      <p><?php echo e($cartItems->sum('quantity')); ?> item(s) in your cart.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <?php if(session('success')): ?>
        <p role="status"><?php echo e(session('success')); ?></p>
      <?php endif; ?>
      <?php if(session('error')): ?>
        <p role="alert"><?php echo e(session('error')); ?></p>
      <?php endif; ?>
      <?php if($errors->any()): ?>
        <div role="alert">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>

      <?php if($cartItems->isEmpty()): ?>
        <div class="cart-summary">
          <h2>Your cart is empty</h2>
          <p>Browse the catalog and add something you like.</p>
          <a href="<?php echo e(route('shop')); ?>" class="btn btn--indigo">Browse products</a>
        </div>
      <?php else: ?>
        <div class="cart-layout">
          <div>
            <div class="cart-list">
              <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($product = $item['product']); ?>
                <article class="cart-row">
                  <div class="pic"><img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"></div>
                  <div class="info">
                    <a class="name" href="<?php echo e(route('product', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                    <div class="variant">
                      <?php if($product->stock > 0): ?>
                        <?php echo e($product->stock); ?> available
                      <?php else: ?>
                        Currently out of stock
                      <?php endif; ?>
                    </div>
                  </div>

                  <?php if($product->stock > 0): ?>
                    <form class="qty cart-quantity" method="POST" action="<?php echo e(route('cart.update', $product->slug)); ?>">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <button type="submit" name="step" value="decrease" data-act="-" aria-label="Decrease quantity for <?php echo e($product->name); ?>" <?php if($item['quantity'] <= 1): echo 'disabled'; endif; ?>>−</button>
                      <input type="text" name="quantity" value="<?php echo e($item['quantity']); ?>" inputmode="numeric" pattern="[0-9]*" min="1" max="<?php echo e($product->stock); ?>" aria-label="Quantity for <?php echo e($product->name); ?>" required>
                      <button type="submit" name="step" value="increase" data-act="+" aria-label="Increase quantity for <?php echo e($product->name); ?>" <?php if($item['quantity'] >= $product->stock): echo 'disabled'; endif; ?>>+</button>
                    </form>
                  <?php else: ?>
                    <span>Qty <?php echo e($item['quantity']); ?></span>
                  <?php endif; ?>

                  <span class="subtotal">&#2547;<?php echo e(number_format($item['subtotal'], 2)); ?></span>
                  <form method="POST" action="<?php echo e(route('cart.remove', $product->slug)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="remove" type="submit" aria-label="Remove <?php echo e($product->name); ?>">×</button>
                  </form>
                </article>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div style="margin-top: var(--s5)">
              <a href="<?php echo e(route('shop')); ?>" class="btn btn--ghost">Continue shopping</a>
            </div>
          </div>

          <aside class="cart-summary">
            <h2>Order summary</h2>
            <div class="cart-line"><span>Subtotal</span><span>&#2547;<?php echo e(number_format($subtotal, 2)); ?></span></div>
            <div class="cart-line"><span>Shipping</span><span>Calculated at checkout</span></div>
            <div class="cart-line is-total"><span>Total</span><span>&#2547;<?php echo e(number_format($subtotal, 2)); ?></span></div>
            <a href="<?php echo e(route('checkout')); ?>" class="btn btn--indigo btn--block">Proceed to checkout</a>
          </aside>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/pages/cart-page.blade.php ENDPATH**/ ?>