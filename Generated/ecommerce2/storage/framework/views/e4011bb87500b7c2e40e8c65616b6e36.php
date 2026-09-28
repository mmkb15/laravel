<?php if(session('success')): ?>
<div class="block-available mb-20"><?php echo e(session('success')); ?></div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="block-not-available mb-20"><?php echo e(session('error')); ?></div>
<?php endif; ?>
<?php if($errors->any()): ?>
<div class="block-not-available mb-20">
    <strong>Please fix the following:</strong>
    <ul class="mt-5">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>
<?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/partials/alerts.blade.php ENDPATH**/ ?>