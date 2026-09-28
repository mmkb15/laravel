<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Edit Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="<?php echo e(route('dashboard')); ?>"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="<?php echo e(route('products.index')); ?>"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit Product</div></li>
            </ul>
        </div>
    </div>

    <form class="template-form two-col" action="<?php echo e(route('products.update', $product)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Product Information</h5></div>

            <div class="template-field">
                <label for="name">Product Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
                <?php $__errorArgs = ['name'];
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
                    <label for="category_id">Category <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="category_id" name="category_id" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $product->category_id) == $category->id): echo 'selected'; endif; ?>><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="template-field">
                    <label for="brand_id">Brand</label>
                    <div class="template-select">
                        <select id="brand_id" name="brand_id">
                            <option value="">No brand</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>" <?php if(old('brand_id', $product->brand_id) == $brand->id): echo 'selected'; endif; ?>><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="sku">SKU <span class="required">*</span></label>
                    <input id="sku" class="template-input" type="text" name="sku" value="<?php echo e(old('sku', $product->sku)); ?>" required>
                    <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="template-field">
                    <label for="stock">Stock <span class="required">*</span></label>
                    <input id="stock" class="template-input" type="number" name="stock" value="<?php echo e(old('stock', $product->stock)); ?>" min="0" required>
                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="price">Regular Price <span class="required">*</span></label>
                    <div class="input-with-prefix"><span>$</span><input id="price" class="template-input" type="number" step="0.01" name="price" value="<?php echo e(old('price', $product->price)); ?>" required></div>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="template-field">
                    <label for="sale_price">Sale Price</label>
                    <div class="input-with-prefix"><span>$</span><input id="sale_price" class="template-input" type="number" step="0.01" name="sale_price" value="<?php echo e(old('sale_price', $product->sale_price)); ?>"></div>
                    <div class="field-hint" id="sale-price-hint"></div>
                    <?php $__errorArgs = ['sale_price'];
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
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" <?php if(old('status', $product->status) === 'active'): echo 'selected'; endif; ?>>Active</option>
                        <option value="inactive" <?php if(old('status', $product->status) === 'inactive'): echo 'selected'; endif; ?>>Inactive</option>
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

            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo e(old('description', $product->description)); ?></textarea>
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

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Product Images</h5></div>
            <div class="template-field">
                <label>Current Images</label>
                <?php if($product->images->count()): ?>
                    <div class="ecom-gallery" data-gallery>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $locked = str_starts_with($image->path, 'assets/'); ?>
                            <div class="ecom-gallery-item <?php echo e($image->is_primary ? 'is-primary' : ''); ?>" data-gallery-item>
                                <div class="ecom-gallery-figure" data-gallery-pick>
                                    <img src="<?php echo e($image->url); ?>" alt="<?php echo e($product->name); ?>">
                                    <span class="ecom-gallery-badge">Primary</span>
                                </div>

                                <div class="ecom-gallery-bar">
                                    <label class="ecom-gallery-primary" for="primary-image-<?php echo e($image->id); ?>">
                                        <input id="primary-image-<?php echo e($image->id); ?>"
                                               type="radio"
                                               name="primary_image_id"
                                               value="<?php echo e($image->id); ?>"
                                               data-gallery-primary
                                               <?php if($image->is_primary): echo 'checked'; endif; ?>>
                                        <span class="label-off">Set as primary</span>
                                        <span class="label-on">Primary</span>
                                    </label>

                                    <?php if(! $locked): ?>
                                        <label class="ecom-gallery-remove" for="remove-image-<?php echo e($image->id); ?>" title="Delete this image on save">
                                            <input id="remove-image-<?php echo e($image->id); ?>"
                                                   type="checkbox"
                                                   name="remove_images[]"
                                                   value="<?php echo e($image->id); ?>"
                                                   data-gallery-remove>
                                            <span>Remove</span>
                                        </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="ecom-upload-note">Click an image to make it the main product photo. Tick <strong>Remove</strong> to delete it when you save.</div>
                <?php else: ?>
                    <div class="ecom-empty">No product images yet.</div>
                <?php endif; ?>
            </div>

            <div class="template-field">
                <label for="product-images">Add More Images</label>
                <input id="product-images" class="filepond" type="file" name="images[]" accept="image/png,image/jpeg,image/webp" multiple>
                <div class="ecom-upload-note">New images are added to the existing gallery.</div>
                <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="field-error"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Update Product</button>
                <a href="<?php echo e(route('products.index')); ?>" class="tf-button style-2 w-full">Cancel</a>
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
            FilePond.create(document.querySelector('#product-images'), {
                allowMultiple: true,
                maxFiles: 8,
                allowImagePreview: true,
                imagePreviewHeight: 160,
                storeAsFile: true,
                credits: false,
                labelIdle: 'Drag & Drop your product images or <span class="filepond--label-action">Browse</span>',
            });
        });
    </script>
    <script src="<?php echo e(asset('assets/js/admin-product-gallery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/admin-product-price.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH X:\New folder 2.0\WDPF\WDPF70\laravel\ecommerce\resources\views/admin/pages/product/edit.blade.php ENDPATH**/ ?>