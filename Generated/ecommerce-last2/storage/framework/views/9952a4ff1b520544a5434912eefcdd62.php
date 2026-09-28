<?php $__env->startSection('title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Order List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Orders</div></li>
            </ul>
        </div>
        <a class="tf-button" href="<?php echo e(route('orders.create')); ?>"><i class="icon-plus"></i>Create Order</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="<?php echo e(route('orders.index')); ?>">
                <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search order or customer...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-filter">
                <form method="GET" action="<?php echo e(route('orders.index')); ?>" class="ecom-filter">
                    <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                    <div class="template-select">
                        <select name="status" onchange="this.form.submit()">
                            <option value="">All Statuses</option>
                            <?php $__currentLoopData = ['pending','processing','shipped','delivered','cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e(ucfirst($status)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </form>
                <span class="ecom-search-count"><?php echo e($orders->total()); ?> order(s)</span>
            </div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-order-table">
                <div class="ecom-table-head">
                    <div class="cell">Order</div>
                    <div class="cell">Customer</div>
                    <div class="cell">Item</div>
                    <div class="cell">Total</div>
                    <div class="cell">Payment</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php ($firstItem = $order->items->first()); ?>
                    <div class="ecom-table-row">
                        <div class="cell">
                            <a href="<?php echo e(route('orders.show', $order)); ?>" class="ecom-primary"><?php echo e($order->order_number); ?></a>
                            <div class="ecom-muted"><?php echo e($order->created_at->format('d M Y, h:i A')); ?></div>
                        </div>
                        <div class="cell">
                            <div class="ecom-user-cell">
                                <div class="ecom-thumb user"><img src="<?php echo e($order->user?->image_url ?? asset('assets/images/avatar/user-1.png')); ?>" alt="<?php echo e($order->user?->name ?? $order->shipping_name); ?>"></div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate"><?php echo e($order->user?->name ?? $order->shipping_name); ?></div>
                                    <div class="ecom-muted"><?php echo e($order->shipping_phone); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            <?php if($firstItem): ?>
                                <div class="ecom-product-cell">
                                    <div class="ecom-thumb"><img src="<?php echo e($firstItem->product?->image_url ?? asset('assets/images/products/1.png')); ?>" alt="<?php echo e($firstItem->product_name); ?>"></div>
                                    <div class="min-w-0">
                                        <div class="ecom-primary text-truncate"><?php echo e($firstItem->product_name); ?></div>
                                        <div class="ecom-muted">Qty: <?php echo e($firstItem->quantity); ?><?php echo e($order->items->count() > 1 ? ' · +'.($order->items->count()-1).' more' : ''); ?></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span>—</span>
                            <?php endif; ?>
                        </div>
                        <div class="cell"><span class="ecom-money">$<?php echo e(number_format($order->total, 2)); ?></span></div>
                        <div class="cell"><span class="body-text"><?php echo e($order->payment_method === 'cod' ? 'Cash on Delivery' : 'Bank Transfer'); ?></span></div>
                        <div class="cell"><span class="ecom-status <?php echo e($order->status); ?>"><?php echo e(ucfirst($order->status)); ?></span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="<?php echo e(route('orders.show', $order)); ?>" class="item eye" title="View order"><i class="icon-eye"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No orders found.</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ecom-pagination"><?php echo e($orders->onEachSide(1)->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/order/index.blade.php ENDPATH**/ ?>