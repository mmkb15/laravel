<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Dashboard</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><div class="text-tiny">Home</div></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Dashboard</div></li>
            </ul>
        </div>
    </div>

    <div class="tf-section-4 mb-30">
        <div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-shopping-cart"></i></div><div><div class="body-text mb-2">Total Products</div><h4><?php echo e(number_format($productCount)); ?></h4></div></div></div>
        <div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-layers"></i></div><div><div class="body-text mb-2">Categories</div><h4><?php echo e(number_format($categoryCount)); ?></h4></div></div></div>
        <div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-file"></i></div><div><div class="body-text mb-2">Orders</div><h4><?php echo e(number_format($orderCount)); ?></h4></div></div></div>
        <div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-users"></i></div><div><div class="body-text mb-2">Customers</div><h4><?php echo e(number_format($customerCount)); ?></h4></div></div></div>
    </div>

    <div class="tf-section-2 mb-30">
        <div class="wg-box">
            <div class="flex items-center justify-between mb-20"><h5>Recent Orders</h5><a class="view-all" href="<?php echo e(route('orders.index')); ?>">View all <i class="icon-chevron-right"></i></a></div>
            <div class="ecom-table-wrap">
                <div class="ecom-table ecom-dashboard-order-table">
                    <div class="ecom-table-head"><div class="cell">Order</div><div class="cell">Customer</div><div class="cell">Total</div><div class="cell">Status</div></div>
                    <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="ecom-table-row">
                            <div class="cell"><a class="ecom-primary" href="<?php echo e(route('orders.show',$order)); ?>"><?php echo e($order->order_number); ?></a><div class="ecom-muted"><?php echo e($order->created_at->format('d M Y')); ?></div></div>
                            <div class="cell"><div class="ecom-user-cell"><div class="ecom-thumb user"><img src="<?php echo e($order->user?->image_url ?? asset('assets/images/avatar/user-1.png')); ?>" alt=""></div><div class="ecom-primary text-truncate"><?php echo e($order->user?->name ?? $order->shipping_name); ?></div></div></div>
                            <div class="cell"><span class="ecom-money">$<?php echo e(number_format($order->total,2)); ?></span></div>
                            <div class="cell"><span class="ecom-status <?php echo e($order->status); ?>"><?php echo e(ucfirst($order->status)); ?></span></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="ecom-empty">No orders yet.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between mb-20"><h5>Low Stock Products</h5><a class="view-all" href="<?php echo e(route('products.index')); ?>">View all <i class="icon-chevron-right"></i></a></div>
            <div class="wg-table table-top-product">
                <?php $__empty_1 = true; $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-item gap14 mb-14">
                        <div class="image"><img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"></div>
                        <div class="flex items-center justify-between flex-grow">
                            <div><div class="body-title-2"><?php echo e($product->name); ?></div><div class="text-tiny mt-3">SKU: <?php echo e($product->sku); ?></div></div>
                            <div class="body-title-2"><?php echo e(number_format($product->stock)); ?> left</div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No low stock products.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="tf-section-4">
        <div class="wg-chart-default"><div class="body-text">Total Sales</div><h4 class="mt-10">$<?php echo e(number_format($salesTotal,2)); ?></h4><div class="text-tiny">Processing, shipped and delivered orders</div></div>
        <div class="wg-chart-default"><div class="body-text">Brands</div><h4 class="mt-10"><?php echo e(number_format($brandCount)); ?></h4><div class="text-tiny">Active catalog brands</div></div>
        <div class="wg-chart-default"><div class="body-text">Low Stock</div><h4 class="mt-10"><?php echo e($lowStockProducts->count()); ?></h4><div class="text-tiny">Products with 5 or fewer units</div></div>
        <div class="wg-chart-default"><div class="body-text">Quick Actions</div><div class="flex gap10 flex-wrap mt-10"><a class="tf-button style-1" href="<?php echo e(route('products.create')); ?>">Add Product</a><a class="tf-button style-2" href="<?php echo e(route('orders.create')); ?>">Create Order</a></div></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
.ecom-dashboard-order-table { min-width: 640px; }
.ecom-dashboard-order-table .ecom-table-head,
.ecom-dashboard-order-table .ecom-table-row { grid-template-columns: minmax(160px,1fr) minmax(190px,1.2fr) 100px 110px; }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>