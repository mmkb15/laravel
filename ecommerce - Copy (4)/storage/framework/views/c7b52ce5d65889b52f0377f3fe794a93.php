

<?php $__env->startSection('title', 'Your Cart'); ?>

<?php $__env->startSection('content'); ?>
<main id="main">
  <section class="page-head">
    <div class="container">
      <div class="crumbs"><a href="<?php echo e(route('home')); ?>">Home</a> <span class="sep">›</span> <span>Shopping cart</span></div>
      <h1>Your cart</h1>
      <p data-cart-item-count>0 items in your cart.</p>
    </div>
  </section>

  <section class="section">
    <div class="container" data-cart-page data-products-url="<?php echo e(route('cart.products')); ?>" data-show-checkout="<?php echo e($errors->any() ? '1' : '0'); ?>">
      <?php if(session('success')): ?>
        <p role="status"><?php echo e(session('success')); ?></p>
      <?php endif; ?>
      <p class="cart-message" role="alert" data-cart-message hidden></p>

      <div class="cart-layout" data-cart-view>
        <div>
          <div class="cart-list" data-cart-items></div>
          <div class="cart-empty" data-cart-empty hidden>
            <h2>Your cart is empty</h2>
            <p>Browse the catalog and add something you like.</p>
            <a href="<?php echo e(route('shop')); ?>" class="btn btn--indigo">Browse products</a>
          </div>
          <div style="margin-top: var(--s5)">
            <a href="<?php echo e(route('shop')); ?>" class="btn btn--ghost">Continue shopping</a>
          </div>
        </div>

        <aside class="cart-summary" data-cart-summary>
          <h2>Order summary</h2>
          <div class="cart-line"><span>Subtotal</span><span data-cart-subtotal>$0.00</span></div>
          <div class="cart-line"><span>Shipping</span><span>Calculated at checkout</span></div>
          <div class="cart-line is-total"><span>Total</span><span data-cart-total>$0.00</span></div>
          <button type="button" class="btn btn--indigo btn--block" data-open-checkout>Proceed to checkout</button>
        </aside>
      </div>

      <section class="checkout-layout checkout-single-page" data-checkout-view hidden>
        <form method="POST" action="<?php echo e(route('checkout.store')); ?>" class="contact-form checkout-form" data-checkout-form>
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

          <div data-checkout-items></div>
          <div class="checkout-actions">
            <button type="button" class="btn btn--ghost" data-back-to-cart>Back to cart</button>
            <button class="btn btn--indigo" type="submit">Place order</button>
          </div>
        </form>

        <aside class="cart-summary">
          <h2>Order summary</h2>
          <div data-checkout-summary></div>
          <div class="cart-line"><span>Shipping</span><span>Free</span></div>
          <div class="cart-line is-total"><span>Total</span><span data-checkout-total>$0.00</span></div>
        </aside>
      </section>
    </div>
  </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/frontend/pages/cart-page.blade.php ENDPATH**/ ?>