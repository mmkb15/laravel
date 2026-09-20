<?php $__env->startSection('title', 'Create Order'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>Create Order</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="<?php echo e(route('orders.index')); ?>"><div class="text-tiny">Orders</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Create Order</div></li>
        </ul>
    </div>

    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'error','messages' => $errors->all()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->all())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

    <form class="template-form two-col" method="POST" action="<?php echo e(route('orders.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-plus"></i><h5>Order Information</h5></div>
            <div class="template-field">
                <label for="user_id">Customer</label>
                <div class="template-select">
                    <select id="user_id" name="user_id">
                        <option value="">Guest Customer</option>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>" <?php if(old('user_id') == $customer->id): echo 'selected'; endif; ?>><?php echo e($customer->name); ?> — <?php echo e($customer->email); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="template-field">
                <label for="product_id">Product <span class="required">*</span></label>
                <div class="template-select">
                    <select id="product_id" name="product_id" required>
                        <option value="">Choose product</option>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>" data-stock="<?php echo e($product->stock); ?>" <?php if(old('product_id') == $product->id): echo 'selected'; endif; ?>><?php echo e($product->name); ?> — $<?php echo e($product->display_price); ?> (<?php echo e($product->stock); ?> in stock)</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="quantity">Quantity <span class="required">*</span></label>
                    <input id="quantity" class="template-input" type="number" name="quantity" value="<?php echo e(old('quantity',1)); ?>" min="1" required>
                    <div class="field-hint" id="stock-hint">Pick a product to see available stock.</div>
                </div>
                <div class="template-field">
                    <label for="payment_method">Payment Method <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="payment_method" name="payment_method" required>
                            <option value="cod" <?php if(old('payment_method') === 'cod'): echo 'selected'; endif; ?>>Cash on Delivery</option>
                            <option value="bank" <?php if(old('payment_method') === 'bank'): echo 'selected'; endif; ?>>Bank Transfer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="template-field">
                <label for="notes">Order Notes</label>
                <textarea id="notes" name="notes" placeholder="Optional order notes..."><?php echo e(old('notes')); ?></textarea>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-map-pin"></i><h5>Shipping Information</h5></div>
            <div class="template-field">
                <label for="shipping_name">Shipping Name <span class="required">*</span></label>
                <input id="shipping_name" class="template-input" type="text" name="shipping_name" value="<?php echo e(old('shipping_name')); ?>" required>
            </div>
            <div class="template-field">
                <label for="shipping_phone">Shipping Phone <span class="required">*</span></label>
                <input id="shipping_phone" class="template-input" type="tel" name="shipping_phone" value="<?php echo e(old('shipping_phone')); ?>" required>
            </div>
            <div class="template-field">
                <label for="shipping_address">Shipping Address <span class="required">*</span></label>
                <textarea id="shipping_address" name="shipping_address" placeholder="Enter full shipping address" required><?php echo e(old('shipping_address')); ?></textarea>
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Create Order</button>
                <a class="tf-button style-2 w-full" href="<?php echo e(route('orders.index')); ?>">Cancel</a>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var product = document.getElementById('product_id');
        var quantity = document.getElementById('quantity');
        var hint = document.getElementById('stock-hint');

        if (!product || !quantity || !hint) {
            return;
        }

        function stockOf(select) {
            var option = select.options[select.selectedIndex];
            return option ? parseInt(option.dataset.stock || '', 10) : NaN;
        }

        function sync() {
            var stock = stockOf(product);

            if (isNaN(stock)) {
                quantity.removeAttribute('max');
                hint.textContent = 'Pick a product to see available stock.';
                hint.classList.remove('is-warning');
                return;
            }

            quantity.max = stock;

            if (parseInt(quantity.value, 10) > stock) {
                quantity.value = stock;
            }

            hint.textContent = stock + ' unit(s) available.';
            hint.classList.toggle('is-warning', stock <= 5);
        }

        product.addEventListener('change', sync);
        quantity.addEventListener('input', function () {
            var stock = stockOf(product);

            if (!isNaN(stock) && parseInt(quantity.value, 10) > stock) {
                hint.textContent = 'Only ' + stock + ' unit(s) in stock.';
                hint.classList.add('is-warning');
            } else {
                sync();
            }
        });

        sync();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/order/create.blade.php ENDPATH**/ ?>