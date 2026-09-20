<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>My Profile</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Profile</div></li>
        </ul>
    </div>

    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => ['type' => 'error','messages' => $errors->all()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->all())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

    <form class="template-form two-col" method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-user"></i><h5>Account Information</h5></div>
            <div class="template-field">
                <label for="name">Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="<?php echo e(old('name',$user->name)); ?>" required>
            </div>
            <div class="template-field">
                <label for="email">Email</label>
                <input id="email" class="template-input" value="<?php echo e($user->email); ?>" disabled>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="phone">Phone</label>
                    <input id="phone" class="template-input" type="tel" name="phone" value="<?php echo e(old('phone',$user->phone)); ?>">
                </div>
                <div class="template-field">
                    <label for="role">Role</label>
                    <input id="role" class="template-input" value="<?php echo e(ucfirst($user->role)); ?>" disabled>
                </div>
            </div>
            <div class="template-field">
                <label for="address">Address</label>
                <textarea id="address" name="address"><?php echo e(old('address',$user->address)); ?></textarea>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Profile Image & Security</h5></div>
            <div class="template-field">
                <label>Current Image</label>
                <div class="ecom-avatar-lg"><img src="<?php echo e($user->image_url); ?>" alt="<?php echo e($user->name); ?>"></div>
            </div>
            <div class="template-field">
                <label for="profile-image">Change Image</label>
                <input id="profile-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
            </div>
            <div class="template-field">
                <label for="password">New Password</label>
                <input id="password" class="template-input" type="password" name="password" placeholder="Leave blank to keep current password">
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Save Changes</button>
                <a class="tf-button style-2 w-full" href="<?php echo e(route('dashboard')); ?>">Back to Dashboard</a>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://unpkg.com/filepond@4.32.12/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create(document.querySelector('#profile-image'), {
                allowMultiple: false,
                allowImagePreview: true,
                imagePreviewHeight: 180,
                storeAsFile: true,
                credits: false,
                labelIdle: 'Drop a profile image or <span class="filepond--label-action">Browse</span>',
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/user/profile.blade.php ENDPATH**/ ?>