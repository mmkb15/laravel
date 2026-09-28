<?php $__env->startSection('title', 'Brands'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Brand List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Brands</div></li>
            </ul>
        </div>
        <a class="tf-button" href="<?php echo e(route('brands.create')); ?>"><i class="icon-plus"></i>Add Brand</a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="<?php echo e(route('brands.index')); ?>">
                <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search brand...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count"><?php echo e($brands->total()); ?> brand(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-brand-table">
                <div class="ecom-table-head">
                    <div class="cell">Brand</div>
                    <div class="cell">Products</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-product-cell">
                                <div class="ecom-thumb">
                                    <?php if($brand->image_url): ?>
                                        <img src="<?php echo e($brand->image_url); ?>" alt="<?php echo e($brand->name); ?>">
                                    <?php else: ?>
                                        <i class="icon-box" style="font-size:20px;color:var(--Main)"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="min-w-0">
                                    <div class="ecom-primary text-truncate"><?php echo e($brand->name); ?></div>
                                    <div class="ecom-muted"><?php echo e($brand->slug); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell"><?php echo e(number_format($brand->products_count)); ?></div>
                        <div class="cell"><span class="ecom-status <?php echo e($brand->status === 'active' ? '' : 'inactive'); ?>"><?php echo e(ucfirst($brand->status)); ?></span></div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="<?php echo e(route('brands.edit', $brand)); ?>" class="item edit" title="Edit brand"><i class="icon-edit-3"></i></a>
                                <form action="<?php echo e(route('brands.destroy', $brand)); ?>" method="POST" onsubmit="return confirm('Delete this brand?');">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="item trash" title="Delete brand"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No brands found.</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="ecom-pagination"><?php echo e($brands->onEachSide(1)->links()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/brand/index.blade.php ENDPATH**/ ?>