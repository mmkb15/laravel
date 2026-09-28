<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
<div class="tf-section-4 mb-30">
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-shopping-bag"></i></div><div><div class="body-text mb-2">Products</div><h4><?php echo e($productCount); ?></h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-layers"></i></div><div><div class="body-text mb-2">Categories</div><h4><?php echo e($categoryCount); ?></h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-file"></i></div><div><div class="body-text mb-2">Orders</div><h4><?php echo e($orderCount); ?></h4></div></div></div>
<div class="wg-chart-default"><div class="flex items-center gap14"><div class="image type-white"><i class="icon-dollar-sign"></i></div><div><div class="body-text mb-2">Sales</div><h4>৳<?php echo e(number_format($salesTotal,2)); ?></h4></div></div></div>
</div>
<div class="wg-box"><div class="flex items-center justify-between mb-20"><h5>Recent Orders</h5><a href="<?php echo e(route('orders.index')); ?>" class="view-all">View all</a></div>
<div class="wg-table"><ul class="table-title flex gap20 mb-14"><li><div class="body-title">Order</div></li><li><div class="body-title">Customer</div></li><li><div class="body-title">Total</div></li><li><div class="body-title">Status</div></li></ul>
<?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><li class="product-item"><div class="flex items-center justify-between flex-grow"><div class="body-title-2"><?php echo e($order->order_number); ?></div><div class="body-text"><?php echo e($order->customer_name); ?></div><div class="body-text">৳<?php echo e(number_format($order->total_amount,2)); ?></div><div class="body-text"><?php echo e($order->status); ?></div></div></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><li class="product-item"><div class="body-text">No orders yet.</div></li><?php endif; ?>
</div></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>