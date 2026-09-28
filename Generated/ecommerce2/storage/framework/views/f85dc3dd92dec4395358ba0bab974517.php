<?php $__env->startSection('content'); ?>
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#"><div class="text-tiny">Ecommerce</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit product</div></li>
            </ul>
        </div>

        <form class="tf-section-2 form-add-product" action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="wg-box">
                
                <fieldset class="name">
                    <div class="body-title mb-10">
                        Product name <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        type="text" placeholder="Enter product name"
                        name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-tiny" style="color:red;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </fieldset>

                
                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">
                            Category <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select name="category_id">
                                <option value="">Choose category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"
                                        <?php echo e(old('category_id', $product->category_id) == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-tiny" style="color:red;"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </fieldset>

                    <fieldset>
                        <div class="body-title mb-10">
                            Status <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select name="status">
                                <option value="active" <?php echo e(old('status', $product->status) == 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="inactive" <?php echo e(old('status', $product->status) == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>
                    </fieldset>
                </div>

                
                <fieldset class="brand">
                    <div class="body-title mb-10">
                        Vendor ID <span class="tf-color-1">*</span>
                    </div>
                    <input class="<?php $__errorArgs = ['vendor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        type="number" placeholder="Enter vendor ID"
                        name="vendor_id" value="<?php echo e(old('vendor_id', $product->vendor_id)); ?>" required>
                    <?php $__errorArgs = ['vendor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-tiny" style="color:red;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </fieldset>

                
                <fieldset class="description">
                    <div class="body-title mb-10">Description</div>
                    <textarea class="mb-10" name="description"
                        placeholder="Description"><?php echo e(old('description', $product->description)); ?></textarea>
                </fieldset>
            </div>

            <div class="wg-box">
                
                <fieldset>
                    <div class="body-title mb-10">Upload image</div>
                    <?php if($product->image): ?>
                        <div class="mb-10">
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" width="100" alt="Current Image">
                            <div class="text-tiny">Current image</div>
                        </div>
                    <?php endif; ?>
                    <div class="upload-image mb-16">
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">
                                    Drop new image here or <span class="tf-color">click to browse</span>
                                </span>
                                <input type="file" id="myFile" name="image">
                            </label>
                        </div>
                    </div>
                </fieldset>

                
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Update product</button>
                    <a href="<?php echo e(route('products.index')); ?>" class="tf-button style-2 w-full">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Mursalin_1295365\Laravel\ecommerce\resources\views/admin/pages/product/edit.blade.php ENDPATH**/ ?>