<?php $__env->startSection('title', 'Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>Sales Reports</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Reports</div></li>
        </ul>
    </div>

    <div class="tf-section-4 mb-30">
        <div class="wg-chart-default"><div class="body-text">Total Sales</div><h4 class="mt-10">$<?php echo e(number_format($sales,2)); ?></h4></div>
        <div class="wg-chart-default"><div class="body-text">Total Orders</div><h4 class="mt-10"><?php echo e(number_format($orders)); ?></h4></div>
        <div class="wg-chart-default"><div class="body-text">Delivered Orders</div><h4 class="mt-10"><?php echo e(number_format($delivered)); ?></h4></div>
        <div class="wg-chart-default"><div class="body-text">Low Stock Products</div><h4 class="mt-10"><?php echo e(number_format($lowStock)); ?></h4></div>
    </div>

    <div class="wg-box">
        <div class="flex items-center justify-between mb-20"><h5>Monthly Sales</h5></div>
        <div class="ecom-table-wrap">
            <div class="ecom-table" style="min-width:640px">
                <div class="ecom-table-head" style="grid-template-columns:1fr 160px 180px"><div class="cell">Month</div><div class="cell">Orders</div><div class="cell">Sales</div></div>
                <?php $__empty_1 = true; $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ecom-table-row" style="grid-template-columns:1fr 160px 180px">
                        <div class="cell ecom-primary"><?php echo e($row->month); ?></div>
                        <div class="cell"><?php echo e(number_format($row->orders)); ?></div>
                        <div class="cell ecom-money">$<?php echo e(number_format($row->total,2)); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No sales data yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/report/index.blade.php ENDPATH**/ ?>