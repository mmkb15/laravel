<?php $__env->startSection('title','Product List'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
<?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="wg-box">
<div class="flex items-center justify-between gap10 flex-wrap mb-20"><h5>Products</h5><a class="tf-button style-1 w208" href="<?php echo e(route('products.create')); ?>"><i class="icon-plus"></i> Add Product</a></div>
<form method="GET" class="wg-filter flex-grow mb-20"><fieldset class="name"><input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search products..."></fieldset><button class="tf-button" type="submit">Search</button></form>
<div class="wg-table table-product-list">
<ul class="table-title flex gap20 mb-14"><li><div class="body-title">Product</div></li><li><div class="body-title">Category</div></li><li><div class="body-title">Price</div></li><li><div class="body-title">Stock</div></li><li><div class="body-title">Status</div></li><li><div class="body-title">Action</div></li></ul>
<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<li class="product-item gap14"><div class="image no-bg">
<?php ($sku=$product->skus->first()); ?>
<?php if($sku?->image_url): ?><img src="<?php echo e(asset('storage/'.$sku->image_url)); ?>" alt="<?php echo e($product->name); ?>"><?php else: ?><img src="<?php echo e(asset('assets/images/products/1.png')); ?>" alt="<?php echo e($product->name); ?>"><?php endif; ?>
</div><div class="flex items-center justify-between gap20 flex-grow">
<div class="name"><a class="body-title-2" href="<?php echo e(route('shop.show',$product)); ?>"><?php echo e($product->name); ?></a><div class="text-tiny"><?php echo e($product->brand?->name ?? 'No brand'); ?></div></div>
<div class="body-text"><?php echo e($product->category?->name ?? '-'); ?></div><div class="body-text"><?php echo e($sku ? number_format($sku->price,2) : '—'); ?></div><div class="body-text"><?php echo e($sku?->stock_quantity ?? 0); ?></div>
<div><?php if($product->is_active): ?><div class="block-available">Active</div><?php else: ?><div class="block-not-available">Inactive</div><?php endif; ?></div>
<div class="list-icon-function"><a href="<?php echo e(route('products.edit',$product)); ?>" class="item edit"><i class="icon-edit-3"></i></a><button type="button" class="item trash js-delete" data-action="<?php echo e(route('products.destroy',$product)); ?>" style="background:none;border:0"><i class="icon-trash-2"></i></button></div>
</div></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><li class="product-item"><div class="body-text">No products found.</div></li><?php endif; ?>
</ul></div><div class="divider"></div><?php echo e($products->links()); ?>

</div></div>
<?php echo $__env->make('admin.partials.delete-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/pages/product/index.blade.php ENDPATH**/ ?>