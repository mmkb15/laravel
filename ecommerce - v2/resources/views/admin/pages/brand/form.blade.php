@extends('admin.layouts.master')

@section('title', $mode === 'create' ? 'Add Brand' : 'Edit Brand')

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>{{ $mode === 'create' ? 'Add Brand' : 'Edit Brand' }}</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="{{ route('brands.index') }}"><div class="text-tiny">Brands</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">{{ $mode === 'create' ? 'Add Brand' : 'Edit Brand' }}</div></li>
        </ul>
    </div>

    <form class="template-form two-col" method="POST" action="{{ $mode === 'create' ? route('brands.store') : route('brands.update',$brand) }}" enctype="multipart/form-data">
        @csrf @if($mode === 'edit') @method('PUT') @endif
        <div class="form-card">
            <div class="form-card-title"><i class="icon-box"></i><h5>Brand Information</h5></div>
            <div class="template-field">
                <label for="name">Brand Name <span class="required">*</span></label>
                <input id="name" class="template-input @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name',$brand->name) }}" placeholder="Enter brand name" required>
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" @selected(old('status',$brand->status ?: 'active') === 'active')>Active</option>
                        <option value="inactive" @selected(old('status',$brand->status) === 'inactive')>Inactive</option>
                    </select>
                </div>
                @error('status')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Brand Image</h5></div>
            @if($brand->image_url)
                <div class="template-field">
                    <label>Current Image</label>
                    <div class="ecom-gallery">
                        <div class="ecom-gallery-item">
                            <img src="{{ $brand->image_url }}" alt="{{ $brand->name }}">
                            <div class="ecom-gallery-actions">
                                <label class="ecom-gallery-remove">
                                    <input type="checkbox" name="remove_image" value="1">
                                    Remove current image
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="template-field">
                <label for="brand-image">{{ $brand->image_url ? 'Replace Image' : 'Upload Image' }}</label>
                <input id="brand-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                <div class="ecom-upload-note">JPG, PNG and WebP. Maximum 2MB.</div>
                @error('image')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Write brand description...">{{ old('description',$brand->description) }}</textarea>
                @error('description')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>{{ $mode === 'create' ? 'Create Brand' : 'Update Brand' }}</button>
                <a class="tf-button style-2 w-full" href="{{ route('brands.index') }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('script')
    <script src="https://unpkg.com/filepond@4.32.12/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create(document.querySelector('#brand-image'), {
                allowMultiple: false,
                allowImagePreview: true,
                imagePreviewHeight: 180,
                storeAsFile: true,
                credits: false,
                labelIdle: 'Drop a brand image or <span class="filepond--label-action">Browse</span>',
            });
        });
    </script>
@endsection
