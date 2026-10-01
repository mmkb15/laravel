<?php $__env->startSection('title', 'Product Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3><?php echo e($product->name); ?></h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="<?php echo e(route('products.index')); ?>"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny"><?php echo e($product->name); ?></div></li>
            </ul>
        </div>
        <div class="flex gap10">
            <a class="tf-button style-2" href="<?php echo e(route('products.index')); ?>"><i class="icon-arrow-left"></i>Back</a>
            <a class="tf-button" href="<?php echo e(route('products.edit', $product)); ?>"><i class="icon-edit-3"></i>Edit Product</a>
        </div>
    </div>

    <div class="ecom-detail-grid">
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Product Images</h5></div>
            <?php if($product->images->count()): ?>
                <div class="ecom-gallery">
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="ecom-gallery-item">
                            <img src="<?php echo e($image->url); ?>" alt="<?php echo e($product->name); ?>">
                            <?php if($image->is_primary): ?><span class="ecom-gallery-badge">Primary</span><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="ecom-empty">No product images yet.</div>
            <?php endif; ?>

            <div class="form-card-title" style="margin-top:8px;"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="body-text"><?php echo e($product->description ?: 'No description provided.'); ?></div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Product Information</h5></div>
            <div class="detail-list">
                <div class="detail-row"><div class="detail-label">SKU</div><div class="detail-value"><?php echo e($product->sku); ?></div></div>
                <div class="detail-row"><div class="detail-label">Category</div><div class="detail-value"><?php echo e($product->category->name ?? 'N/A'); ?></div></div>
                <div class="detail-row"><div class="detail-label">Brand</div><div class="detail-value"><?php echo e($product->brand->name ?? 'No brand'); ?></div></div>
                <div class="detail-row"><div class="detail-label">Regular Price</div><div class="detail-value">$<?php echo e(number_format($product->price, 2)); ?></div></div>
                <div class="detail-row"><div class="detail-label">Sale Price</div><div class="detail-value"><?php echo e($product->sale_price ? '$' . number_format($product->sale_price, 2) : '—'); ?></div></div>
                <div class="detail-row"><div class="detail-label">Stock</div><div class="detail-value"><?php echo e(number_format($product->stock)); ?> units</div></div>
                <div class="detail-row">
                    <div class="detail-label">Status</div>
                    <div class="detail-value"><span class="ecom-status <?php echo e($product->status === 'active' ? '' : 'inactive'); ?>"><?php echo e(ucfirst($product->status)); ?></span></div>
                </div>
                <div class="detail-row"><div class="detail-label">Created</div><div class="detail-value"><?php echo e($product->created_at->format('d M Y, h:i A')); ?></div></div>
                <div class="detail-row"><div class="detail-label">Last Updated</div><div class="detail-value"><?php echo e($product->updated_at->format('d M Y, h:i A')); ?></div></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views\admin\pages\product\show.blade.php ENDPATH**/ ?>