@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Edit Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('products.index') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit Product</div></li>
            </ul>
        </div>
    </div>

    <form class="template-form two-col" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Product Information</h5></div>

            <div class="template-field">
                <label for="name">Product Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="category_id">Category <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label for="brand_id">Brand</label>
                    <div class="template-select">
                        <select id="brand_id" name="brand_id">
                            <option value="">No brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('brand_id')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="sku">SKU <span class="required">*</span></label>
                    <input id="sku" class="template-input" type="text" name="sku" value="{{ old('sku', $product->sku) }}" required>
                    @error('sku')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label for="stock">Stock <span class="required">*</span></label>
                    <input id="stock" class="template-input" type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required>
                    @error('stock')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="price">Regular Price <span class="required">*</span></label>
                    <div class="input-with-prefix"><span>$</span><input id="price" class="template-input" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required></div>
                    @error('price')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label for="sale_price">Sale Price</label>
                    <div class="input-with-prefix"><span>$</span><input id="sale_price" class="template-input" type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"></div>
                    @error('sale_price')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" @selected(old('status', $product->status) === 'active')>Active</option>
                        <option value="inactive" @selected(old('status', $product->status) === 'inactive')>Inactive</option>
                    </select>
                </div>
                @error('status')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Product Images</h5></div>
            <div class="template-field">
                <label>Current Images</label>
                @if($product->images->count())
                    <div class="ecom-gallery" data-gallery>
                        @foreach($product->images as $image)
                            @php $locked = str_starts_with($image->path, 'assets/'); @endphp
                            <div class="ecom-gallery-item {{ $image->is_primary ? 'is-primary' : '' }}" data-gallery-item>
                                <div class="ecom-gallery-figure" data-gallery-pick>
                                    <img src="{{ $image->url }}" alt="{{ $product->name }}">
                                    <span class="ecom-gallery-badge">Primary</span>
                                </div>

                                <div class="ecom-gallery-bar">
                                    <label class="ecom-gallery-primary" for="primary-image-{{ $image->id }}">
                                        <input id="primary-image-{{ $image->id }}"
                                               type="radio"
                                               name="primary_image_id"
                                               value="{{ $image->id }}"
                                               data-gallery-primary
                                               @checked($image->is_primary)>
                                        <span class="label-off">Set as primary</span>
                                        <span class="label-on">Primary</span>
                                    </label>

                                    @if(! $locked)
                                        <label class="ecom-gallery-remove" for="remove-image-{{ $image->id }}" title="Delete this image on save">
                                            <input id="remove-image-{{ $image->id }}"
                                                   type="checkbox"
                                                   name="remove_images[]"
                                                   value="{{ $image->id }}"
                                                   data-gallery-remove>
                                            <span>Remove</span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="ecom-upload-note">Click an image to make it the main product photo. Tick <strong>Remove</strong> to delete it when you save.</div>
                @else
                    <div class="ecom-empty">No product images yet.</div>
                @endif
            </div>

            <div class="template-field">
                <label for="product-images">Add More Images</label>
                <input id="product-images" class="filepond" type="file" name="images[]" accept="image/png,image/jpeg,image/webp" multiple>
                <div class="ecom-upload-note">New images are added to the existing gallery.</div>
                @error('images')<div class="field-error">{{ $message }}</div>@enderror
                @error('images.*')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Update Product</button>
                <a href="{{ route('products.index') }}" class="tf-button style-2 w-full">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
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
    <script src="{{ asset('assets/js/admin-product-gallery.js') }}"></script>
@endsection
