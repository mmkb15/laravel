<?php $__env->startSection('title', 'Add Product'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
<?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<form class="tf-section-2 form-add-product" action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?> 
<div class="wg-box">
<fieldset><div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div><input type="text" name="name" value="<?php echo e(old('name',$product->name)); ?>" required></fieldset>
<div class="gap22 cols">
<fieldset><div class="body-title mb-10">Category <span class="tf-color-1">*</span></div><div class="select"><select name="category_id" required><option value="">Choose category</option><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($category->category_id); ?>" <?php if(old('category_id',$product->category_id)==$category->category_id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></fieldset>
<fieldset><div class="body-title mb-10">Brand</div><div class="select"><select name="brand_id"><option value="">No brand</option><?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($brand->brand_id); ?>" <?php if(old('brand_id',$product->brand_id)==$brand->brand_id): echo 'selected'; endif; ?>><?php echo e($brand->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></fieldset>
</div>
<fieldset><div class="body-title mb-10">Description</div><textarea name="description"><?php echo e(old('description',$product->description)); ?></textarea></fieldset>
<fieldset><div class="body-title mb-10">Status</div><div class="select"><select name="is_active"><option value="1" <?php if(old('is_active',$product->exists?(int)$product->is_active:1)==1): echo 'selected'; endif; ?>>Active</option><option value="0" <?php if(old('is_active',$product->exists?(int)$product->is_active:1)==0): echo 'selected'; endif; ?>>Inactive</option></select></div></fieldset>
</div>
<div class="wg-box">
<h5 class="mb-20">Primary SKU</h5>
<fieldset><div class="body-title mb-10">SKU Code <span class="tf-color-1">*</span></div><input type="text" name="sku_code" value="<?php echo e(old('sku_code',$sku?->sku_code)); ?>" required></fieldset>
<div class="gap22 cols"><fieldset><div class="body-title mb-10">Price <span class="tf-color-1">*</span></div><input type="number" step="0.01" min="0" name="price" value="<?php echo e(old('price',$sku?->price)); ?>" required></fieldset>
<fieldset><div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div><input type="number" min="0" name="stock_quantity" value="<?php echo e(old('stock_quantity',$sku?->stock_quantity ?? 0)); ?>" required></fieldset></div>
<fieldset><div class="body-title mb-10">Product Image</div><?php if($sku?->image_url): ?><img src="<?php echo e(asset('storage/'.$sku->image_url)); ?>" style="width:90px;height:90px;object-fit:cover;margin-bottom:10px" alt=""><?php endif; ?><input type="file" name="sku_image" accept="image/*"></fieldset>
<div class="cols gap10"><button class="tf-button w-full" type="submit">Add Product</button><a href="<?php echo e(route('products.index')); ?>" class="tf-button style-2 w-full">Cancel</a></div>
</div></form></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce2\resources\views/admin/pages/product/create.blade.php ENDPATH**/ ?>