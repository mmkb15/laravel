<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Product List</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Products</div></li>
            </ul>
        </div>
        <a class="tf-button style-1 w180" href="<?php echo e(route('products.create')); ?>">
            <i class="icon-plus"></i>Add Product
        </a>
    </div>

    <div class="wg-box">
        <div class="ecom-toolbar">
            <form class="ecom-search" method="GET" action="<?php echo e(route('products.index')); ?>">
                <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search product, SKU or brand...">
                <button type="submit" aria-label="Search"><i class="icon-search"></i></button>
            </form>
            <div class="ecom-search-count"><?php echo e($products->total()); ?> product(s)</div>
        </div>

        <div class="ecom-table-wrap">
            <div class="ecom-table ecom-product-table">
                <div class="ecom-table-head">
                    <div class="cell">Product</div>
                    <div class="cell">SKU</div>
                    <div class="cell">Brand</div>
                    <div class="cell">Category</div>
                    <div class="cell">Price</div>
                    <div class="cell">Stock</div>
                    <div class="cell">Status</div>
                    <div class="cell cell-right">Action</div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ecom-table-row">
                        <div class="cell">
                            <div class="ecom-product-cell">
                                <div class="ecom-thumb"><img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>"></div>
                                <div class="min-w-0">
                                    <a href="<?php echo e(route('products.edit', $product)); ?>" class="ecom-primary text-truncate d-block"><?php echo e($product->name); ?></a>
                                    <div class="ecom-muted">#<?php echo e($product->id); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell"><span class="body-text"><?php echo e($product->sku); ?></span></div>
                        <div class="cell"><span class="body-text"><?php echo e($product->brand->name ?? '—'); ?></span></div>
                        <div class="cell"><span class="body-text"><?php echo e($product->category->name ?? 'Uncategorized'); ?></span></div>
                        <div class="cell"><span class="ecom-money">$<?php echo e($product->display_price); ?></span></div>
                        <div class="cell"><span class="body-text"><?php echo e(number_format($product->stock)); ?></span></div>
                        <div class="cell">
                            <span class="ecom-status <?php echo e($product->status === 'active' ? '' : 'inactive'); ?>"><?php echo e(ucfirst($product->status)); ?></span>
                        </div>
                        <div class="cell">
                            <div class="ecom-actions">
                                <a href="<?php echo e(route('products.show', $product)); ?>" class="item eye" title="View product"><i class="icon-eye"></i></a>
                                <a href="<?php echo e(route('products.edit', $product)); ?>" class="item edit" title="Edit product"><i class="icon-edit-3"></i></a>
                                <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('Delete this product?');">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="item trash" title="Delete product"><i class="icon-trash-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ecom-empty">No products found.</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="ecom-pagination">
            <?php echo e($products->onEachSide(1)->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/product/index.blade.php ENDPATH**/ ?>