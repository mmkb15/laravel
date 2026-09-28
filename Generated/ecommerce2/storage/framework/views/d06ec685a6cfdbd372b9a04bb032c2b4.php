<?php $__env->startSection('title','Order List'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
<?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="wg-box"><div class="flex items-center justify-between mb-20"><h5>Orders</h5><a href="<?php echo e(route('shop.index')); ?>" class="tf-button style-2">Open Store</a></div>
<div class="wg-table"><ul class="table-title flex gap20 mb-14"><li><div class="body-title">Order</div></li><li><div class="body-title">Customer</div></li><li><div class="body-title">Total</div></li><li><div class="body-title">Status</div></li><li><div class="body-title">Action</div></li></ul>
<?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><li class="product-item"><div class="flex items-center justify-between flex-grow gap20">
<div><div class="body-title-2"><?php echo e($order->order_number); ?></div><div class="text-tiny"><?php echo e($order->order_date?->format('d M Y h:i A')); ?></div></div>
<div class="body-text"><?php echo e($order->customer_name); ?></div><div class="body-text">৳<?php echo e(number_format($order->total_amount,2)); ?></div>
<div class="body-text"><?php echo e($order->status); ?></div><div class="list-icon-function"><a class="item edit" href="<?php echo e(route('orders.show',$order)); ?>"><i class="icon-eye"></i></a></div>
</div></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><li class="product-item"><div class="body-text">No orders yet. Place one from the store.</div></li><?php endif; ?></div>
<div class="mt-20"><?php echo e($orders->links()); ?></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/pages/order/index.blade.php ENDPATH**/ ?>