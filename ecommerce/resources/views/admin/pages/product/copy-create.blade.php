@extends('admin.layouts.master')

@section('title', 'Add Product')

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="flex items-center flex-wrap justify-between gap20 ecom-page-header">
        <div>
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('products.index') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Add Product</div></li>
            </ul>
        </div>
    </div>

    <form class="template-form two-col" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-card">
            <div class="form-card-title"><i class="icon-shopping-cart"></i><h5>Product Information</h5></div>

            <div class="template-field">
                <label for="name">Product Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name') }}" placeholder="Enter product name" required>
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="category_id">Category <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="category_id" name="category_id" required>
                            <option value="">Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
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
                                <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('brand_id')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="sku">SKU <span class="required">*</span></label>
                    <input id="sku" class="template-input" type="text" name="sku" value="{{ old('sku') }}" placeholder="e.g. SKU-1001" required>
                    @error('sku')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label for="stock">Stock <span class="required">*</span></label>
                    <input id="stock" class="template-input" type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required>
                    @error('stock')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="form-grid-2">
                <div class="template-field">
                    <label for="price">Regular Price <span class="required">*</span></label>
                    <div class="input-with-prefix"><span>$</span><input id="price" class="template-input" type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="0.00" required></div>
                    @error('price')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label for="sale_price">Sale Price</label>
                    <div class="input-with-prefix"><span>$</span><input id="sale_price" class="template-input" type="number" step="0.01" name="sale_price" value="{{ old('sale_price') }}" placeholder="0.00"></div>
                    @error('sale_price')<div class="field-error">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" @selected(old('status', 'active') === 'active')>Active</option>
                        <option value="inactive" @selected(old('status') === 'inactive')>Inactive</option>
                    </select>
                </div>
                @error('status')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Write product description...">{{ old('description') }}</textarea>
                @error('description')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Product Images</h5></div>
            <div class="template-field">
                <label for="product-images">Upload Images</label>
                <input id="product-images" class="filepond" type="file" name="images[]" accept="image/png,image/jpeg,image/webp" multiple>
                <div class="ecom-upload-note">Add up to 8 images. JPG, PNG and WebP. Maximum 4MB per image.</div>
                @error('images')<div class="field-error">{{ $message }}</div>@enderror
                @error('images.*')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Add Product</button>
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
                labelFileProcessing: 'Preparing...',
                labelTapToCancel: 'tap to cancel',
            });
        });
    </script>
@endsection
