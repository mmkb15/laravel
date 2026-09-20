@extends('admin.layouts.master')

@section('title', 'Add Category')

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <div class="flex items-center flex-wrap justify-between gap20">
            <div>
                <h3>Add Category</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><a href="{{ route('categories.index') }}"><div class="text-tiny">Categories</div></a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    <li><div class="text-tiny">Add Category</div></li>
                </ul>
            </div>
        </div>
    </div>

    <form class="template-form two-col" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-card">
            <div class="form-card-title"><i class="icon-layers"></i><h5>Category Information</h5></div>
            <div class="template-field">
                <label for="name">Category Name <span class="required">*</span></label>
                <input id="name" class="template-input @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter category name" required>
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="template-field">
                <label for="parent_id">Parent Category</label>
                <div class="template-select">
                    <select id="parent_id" name="parent_id">
                        <option value="">None</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" @selected(old('parent_id') == $parent->id)>{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('parent_id')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" @selected(old('status','active') === 'active')>Active</option>
                        <option value="inactive" @selected(old('status') === 'inactive')>Inactive</option>
                    </select>
                </div>
                @error('status')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Category Image</h5></div>
            <div class="template-field">
                <label for="category-image">Upload Image</label>
                <input id="category-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                <div class="ecom-upload-note">JPG, PNG and WebP. Maximum 2MB.</div>
                @error('image')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Write category description...">{{ old('description') }}</textarea>
                @error('description')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>Create Category</button>
                <a class="tf-button style-2 w-full" href="{{ route('categories.index') }}">Cancel</a>
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
@endsection
