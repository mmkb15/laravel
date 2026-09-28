<?php $__env->startSection('title','Brand List'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
<?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="wg-box">
<div class="flex items-center justify-between mb-20"><h5>All Brands</h5><a href="<?php echo e(route('brands.create')); ?>" class="tf-button"><i class="icon-plus"></i> Add New</a></div>
<div class="wg-table">
<ul class="table-title flex gap20 mb-14"><li><div class="body-title">Brand</div></li><li><div class="body-title">Products</div></li><li><div class="body-title">Action</div></li></ul>
<?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<li class="product-item"><div class="flex items-center justify-between flex-grow">
<div class="name body-text"><?php echo e($brand->name); ?></div><div class="body-text"><?php echo e($brand->products_count); ?></div>
<div class="list-icon-function"><a href="<?php echo e(route('brands.edit',$brand)); ?>" class="item edit"><i class="icon-edit-3"></i></a><button type="button" class="item trash js-delete" data-action="<?php echo e(route('brands.destroy',$brand)); ?>" style="background:none;border:0"><i class="icon-trash-2"></i></button></div>
</div></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><li class="product-item"><div class="body-text">No brands found.</div></li><?php endif; ?>
</div><div class="mt-20"><?php echo e($brands->links()); ?></div>
</div></div>
<?php echo $__env->make('admin.partials.delete-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/pages/brand/index.blade.php ENDPATH**/ ?>