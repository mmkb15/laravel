<?php $__env->startSection('title', 'Edit Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <div>
            <h3>Edit Category</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="<?php echo e(route('categories.index')); ?>"><div class="text-tiny">Categories</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit Category</div></li>
            </ul>
        </div>
    </div>

    <form class="template-form two-col" method="POST" action="<?php echo e(route('categories.update', $category)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-layers"></i><h5>Category Information</h5></div>
            <div class="template-field">
                <label for="name">Category Name <span class="required">*</span></label>
                <input id="name" class="template-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="name" value="<?php echo e(old('name',$category->name)); ?>" required>
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
                <label for="parent_id">Parent Category</label>
                <div class="template-select">
                    <select id="parent_id" name="parent_id">
                        <option value="">None</option>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($parent->id); ?>" <?php if(old('parent_id',$category->parent_id) == $parent->id): echo 'selected'; endif; ?>><?php echo e($parent->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php $__errorArgs = ['parent_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" <?php if(old('status',$category->status) === 'active'): echo 'selected'; endif; ?>>Active</option>
                        <option value="inactive" <?php if(old('status',$category->status) === 'inactive'): echo 'selected'; endif; ?>>Inactive</option>
                    </select>
                </div>
                <?php $__errorArgs = ['status'];
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
            <div class="form-card-title"><i class="icon-image"></i><h5>Category Image</h5></div>
            <?php if($category->image_url): ?>
                <div class="template-field">
                    <label>Current Image</label>
                    <div class="ecom-gallery">
                        <div class="ecom-gallery-item">
                            <img src="<?php echo e($category->image_url); ?>" alt="<?php echo e($category->name); ?>">
                            <div class="ecom-gallery-actions">
                                <label class="ecom-gallery-remove">
                                    <input type="checkbox" name="remove_image" value="1">
                                    Remove current image
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="template-field">
                <label for="category-image"><?php echo e($category->image_url ? 'Replace Image' : 'Upload Image'); ?></label>
                <input id="category-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
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
                <button class="tf-button w-full" type="submit">Update Category</button>
                <a class="tf-button style-2 w-full" href="<?php echo e(route('categories.index')); ?>">Cancel</a>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo e(old('description',$category->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://unpkg.com/filepond@4.32.12/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create(document.querySelector('#category-image'), {
                allowMultiple: false,
                allowImagePreview: true,
                imagePreviewHeight: 180,
                storeAsFile: true,
                credits: false,
                labelIdle: 'Drop a category image or <span class="filepond--label-action">Browse</span>',
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/pages/category/edit.blade.php ENDPATH**/ ?>