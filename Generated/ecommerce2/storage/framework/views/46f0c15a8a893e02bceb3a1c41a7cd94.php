<?php $__env->startSection('title','Edit Category'); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <?php echo $__env->make('admin.partials.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="wg-box">
        <h5 class="mb-20">Edit Category</h5>
        <form action="<?php echo e(route('categories.update',$category)); ?>" method="POST" class="form-style-1">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <fieldset><div class="body-title mb-10">Category Name <span class="tf-color-1">*</span></div><input type="text" name="name" value="<?php echo e(old('name',$category->name)); ?>" required></fieldset>
            <fieldset><div class="body-title mb-10">Parent Category</div><div class="select"><select name="parent_id"><option value="">-- None --</option><?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($parent->category_id); ?>" <?php if(old('parent_id',$category->parent_id)==$parent->category_id): echo 'selected'; endif; ?>><?php echo e($parent->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></fieldset>
            <fieldset><div class="body-title mb-10">Description</div><textarea name="description"><?php echo e(old('description',$category->description)); ?></textarea></fieldset>
            <div class="cols gap10"><button class="tf-button w200" type="submit">Update</button><a class="tf-button style-2 w200" href="<?php echo e(route('categories.index')); ?>">Cancel</a></div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/pages/category/edit.blade.php ENDPATH**/ ?>