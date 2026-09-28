<?php $__env->startSection('title', $mode === 'create' ? 'Add User' : 'Edit User'); ?>

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3><?php echo e($mode === 'create' ? 'Add User' : 'Edit User'); ?></h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="<?php echo e(route('users.index')); ?>"><div class="text-tiny">Users</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny"><?php echo e($mode === 'create' ? 'Add User' : 'Edit User'); ?></div></li>
        </ul>
    </div>

    <form class="template-form two-col" method="POST" action="<?php echo e($mode === 'create' ? route('users.store') : route('users.update',$user)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php if($mode === 'edit'): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-user"></i><h5>User Information</h5></div>
            <div class="template-field">
                <label for="name">Full Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="<?php echo e(old('name',$user->name)); ?>" placeholder="Enter full name" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="template-field">
                <label for="email">Email Address <span class="required">*</span></label>
                <input id="email" class="template-input" type="email" name="email" value="<?php echo e(old('email',$user->email)); ?>" placeholder="name@example.com" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="role">Role <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="role" name="role" required>
                            <option value="customer" <?php if(old('role',$user->role) === 'customer'): echo 'selected'; endif; ?>>Customer</option>
                            <option value="admin" <?php if(old('role',$user->role) === 'admin'): echo 'selected'; endif; ?>>Admin</option>
                        </select>
                    </div>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="template-field">
                    <label for="phone">Phone</label>
                    <input id="phone" class="template-input" type="tel" name="phone" value="<?php echo e(old('phone',$user->phone)); ?>" placeholder="Enter phone number">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="template-field">
                <label for="password">Password <?php if($mode === 'create'): ?><span class="required">*</span><?php endif; ?></label>
                <input id="password" class="template-input" type="password" name="password" placeholder="<?php echo e($mode === 'edit' ? 'Leave blank to keep current password' : 'Minimum 8 characters'); ?>" <?php echo e($mode === 'create' ? 'required' : ''); ?>>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="template-field">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter address"><?php echo e(old('address',$user->address)); ?></textarea>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Profile Image</h5></div>
            <div class="template-field">
                <label>Current Image</label>
                <div class="ecom-avatar-lg"><img src="<?php echo e($user->image_url); ?>" alt="<?php echo e($user->name ?: 'User'); ?>"></div>
            </div>
            <div class="template-field">
                <label for="user-image">Upload New Image</label>
                <input id="user-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                <div class="ecom-upload-note">JPG, PNG and WebP. Maximum 2MB.</div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i><?php echo e($mode === 'create' ? 'Create User' : 'Update User'); ?></button>
                <a class="tf-button style-2 w-full" href="<?php echo e(route('users.index')); ?>">Cancel</a>
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
            FilePond.create(document.querySelector('#user-image'), {
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

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/user/form.blade.php ENDPATH**/ ?>