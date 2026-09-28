<?php $__env->startSection('title','Category List'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="wg-box">
        <div class="flex items-center justify-between mb-20">
            <h5>All Categories</h5>
            <a href="<?php echo e(route('categories.create')); ?>" class="tf-button"><i class="icon-plus"></i> Add New</a>
        </div>
        <div class="wg-table table-all-category">
            <ul class="table-title flex gap20 mb-14">
                <li><div class="body-title">Name</div></li><li><div class="body-title">Parent</div></li><li><div class="body-title">Description</div></li><li><div class="body-title">Action</div></li>
            </ul>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <li class="product-item">
                <div class="flex items-center justify-between flex-grow gap20">
                    <div class="name body-text"><?php echo e($category->name); ?></div>
                    <div class="body-text"><?php echo e($category->parent?->name ?? '-'); ?></div>
                    <div class="body-text"><?php echo e(\Illuminate\Support\Str::limit($category->description, 45)); ?></div>
                    <div class="list-icon-function">
                        <a href="<?php echo e(route('categories.edit',$category)); ?>" class="item edit"><i class="icon-edit-3"></i></a>
                        <form action="<?php echo e(route('categories.destroy',$category)); ?>" method="POST" class="delete-form"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="button" class="item trash js-delete" data-action="<?php echo e(route('categories.destroy',$category)); ?>"><i class="icon-trash-2"></i></button>
                        </form>
                    </div>
                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> <li class="product-item"><div class="body-text">No categories found.</div></li> <?php endif; ?>
        </div>
        <div class="mt-20"><?php echo e($categories->links()); ?></div>
    </div>
</div>
<?php echo $__env->make('admin.partials.delete-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/pages/category/index.blade.php ENDPATH**/ ?>