<?php $__env->startSection('title', 'Order Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Order <?php echo e($order->order_number); ?></h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="<?php echo e(route('orders.index')); ?>"><div class="text-tiny">Orders</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Order Details</div></li>
            </ul>
        </div>
        <a class="tf-button style-2" href="<?php echo e(route('orders.index')); ?>"><i class="icon-arrow-left"></i>Back to Orders</a>
    </div>

    <div class="ecom-detail-grid">
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Order Items</h5></div>
            <?php $__empty_1 = true; $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="ecom-order-item">
                    <div class="ecom-thumb"><img src="<?php echo e($item->product?->image_url ?? asset('assets/images/products/1.png')); ?>" alt="<?php echo e($item->product_name); ?>"></div>
                    <div class="min-w-0">
                        <div class="ecom-primary text-truncate"><?php echo e($item->product_name); ?></div>
                        <div class="ecom-muted">Qty <?php echo e($item->quantity); ?> × $<?php echo e(number_format($item->unit_price,2)); ?></div>
                    </div>
                    <div class="ecom-money">$<?php echo e(number_format($item->subtotal,2)); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="ecom-empty">No order items found.</div>
            <?php endif; ?>

            <div class="summary-total">
                <div class="total-row"><span class="body-text">Subtotal</span><strong>$<?php echo e(number_format($order->subtotal,2)); ?></strong></div>
                <div class="total-row"><span class="body-text">Shipping</span><strong>$<?php echo e(number_format($order->shipping_cost,2)); ?></strong></div>
                <div class="total-row"><span class="body-text">Discount</span><strong>-$<?php echo e(number_format($order->discount,2)); ?></strong></div>
                <div class="total-row"><span class="body-title-2">Order Total</span><strong class="body-title-2">$<?php echo e(number_format($order->total,2)); ?></strong></div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Order Summary</h5></div>
            <div class="detail-list">
                <div class="detail-row"><div class="detail-label">Customer</div><div class="detail-value"><?php echo e($order->user?->name ?? $order->shipping_name); ?></div></div>
                <div class="detail-row"><div class="detail-label">Email</div><div class="detail-value"><?php echo e($order->user?->email ?? 'Guest customer'); ?></div></div>
                <div class="detail-row"><div class="detail-label">Phone</div><div class="detail-value"><?php echo e($order->shipping_phone); ?></div></div>
                <div class="detail-row"><div class="detail-label">Address</div><div class="detail-value"><?php echo e($order->shipping_address); ?></div></div>
                <div class="detail-row"><div class="detail-label">Payment</div><div class="detail-value"><?php echo e($order->payment_method === 'cod' ? 'Cash on Delivery' : 'Bank Transfer'); ?> · <?php echo e(ucfirst($order->payment_status)); ?></div></div>
                <div class="detail-row"><div class="detail-label">Created</div><div class="detail-value"><?php echo e($order->created_at->format('d M Y, h:i A')); ?></div></div>
            </div>

            <div class="template-field">
                <label for="status">Order Status</label>
                <form method="POST" action="<?php echo e(route('orders.status',$order)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <div class="template-select">
                        <select id="status" name="status">
                            <?php $__currentLoopData = ['pending','processing','shipped','delivered','cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($order->status === $status): echo 'selected'; endif; ?>><?php echo e(ucfirst($status)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button class="tf-button w-full mt-15" type="submit"><i class="icon-refresh-cw"></i>Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/order/show.blade.php ENDPATH**/ ?>