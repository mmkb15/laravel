

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="sep">›</span> <a href="<?php echo e(route('cart')); ?>">Cart</a> <span class="sep">›</span> <span>Checkout</span></div>
      <h1>Checkout</h1>
      <p>Enter your delivery details to place your order.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="cart-layout checkout-layout">
        <form method="POST" action="<?php echo e(route('checkout.store')); ?>" class="contact-form checkout-form">
          <?php echo csrf_field(); ?>
          <?php if($errors->any()): ?>
            <div role="alert" class="checkout-errors">
              <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          <?php endif; ?>

          <h2 class="checkout-section-title">Delivery details</h2>
          <div class="field-row">
            <div class="field">
              <label for="shipping-name">Full name</label>
              <input id="shipping-name" name="shipping_name" value="<?php echo e(old('shipping_name')); ?>" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="shipping-phone">Phone number</label>
              <input id="shipping-phone" name="shipping_phone" value="<?php echo e(old('shipping_phone')); ?>" autocomplete="tel" required>
            </div>
          </div>

          <div class="field">
            <label for="shipping-address">Delivery address</label>
            <textarea id="shipping-address" name="shipping_address" rows="4" autocomplete="street-address" required><?php echo e(old('shipping_address')); ?></textarea>
          </div>

          <div class="field">
            <label for="order-notes">Order notes (optional)</label>
            <textarea id="order-notes" name="notes" rows="3"><?php echo e(old('notes')); ?></textarea>
          </div>

          <div class="field checkout-payment">
            <div class="checkout-section-title">Payment method</div>
            <label class="checkout-payment-option"><input type="radio" name="payment_method" value="cod" <?php if(old('payment_method', 'cod') === 'cod'): echo 'checked'; endif; ?> required> Cash on delivery</label>
            <label class="checkout-payment-option"><input type="radio" name="payment_method" value="bank" <?php if(old('payment_method') === 'bank'): echo 'checked'; endif; ?>> Bank transfer</label>
          </div>

          <button class="btn btn--indigo btn--block" type="submit">Place order</button>
        </form>

        <aside class="cart-summary">
          <h2>Order summary</h2>
          <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart-line">
              <span><?php echo e($item['product']->name); ?> × <?php echo e($item['quantity']); ?></span>
              <span>&#2547;<?php echo e(number_format($item['subtotal'], 2)); ?></span>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="cart-line"><span>Shipping</span><span>Free</span></div>
          <div class="cart-line is-total"><span>Total</span><span>&#2547;<?php echo e(number_format($subtotal, 2)); ?></span></div>
        </aside>
      </div>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/pages/checkout.blade.php ENDPATH**/ ?>