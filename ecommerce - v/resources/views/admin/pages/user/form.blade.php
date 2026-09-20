@extends('admin.layouts.master')

@section('title', $mode === 'create' ? 'Add User' : 'Edit User')

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>{{ $mode === 'create' ? 'Add User' : 'Edit User' }}</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="{{ route('users.index') }}"><div class="text-tiny">Users</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">{{ $mode === 'create' ? 'Add User' : 'Edit User' }}</div></li>
        </ul>
    </div>

    @if($errors->any())<div class="alert alert-danger mb-20">{{ $errors->first() }}</div>@endif

    <form class="template-form two-col" method="POST" action="{{ $mode === 'create' ? route('users.store') : route('users.update',$user) }}" enctype="multipart/form-data">
        @csrf @if($mode === 'edit') @method('PUT') @endif
        <div class="form-card">
            <div class="form-card-title"><i class="icon-user"></i><h5>User Information</h5></div>
            <div class="template-field">
                <label for="name">Full Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="Enter full name" required>
            </div>
            <div class="template-field">
                <label for="email">Email Address <span class="required">*</span></label>
                <input id="email" class="template-input" type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="name@example.com" required>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="role">Role <span class="required">*</span></label>
                    <div class="template-select">
                        <select id="role" name="role" required>
                            <option value="customer" @selected(old('role',$user->role) === 'customer')>Customer</option>
                            <option value="admin" @selected(old('role',$user->role) === 'admin')>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="template-field">
                    <label for="phone">Phone</label>
                    <input id="phone" class="template-input" type="tel" name="phone" value="{{ old('phone',$user->phone) }}" placeholder="Enter phone number">
                </div>
            </div>
            <div class="template-field">
                <label for="password">Password @if($mode === 'create')<span class="required">*</span>@endif</label>
                <input id="password" class="template-input" type="password" name="password" placeholder="{{ $mode === 'edit' ? 'Leave blank to keep current password' : 'Minimum 8 characters' }}" {{ $mode === 'create' ? 'required' : '' }}>
            </div>
            <div class="template-field">
                <label for="address">Address</label>
                <textarea id="address" name="address" placeholder="Enter address">{{ old('address',$user->address) }}</textarea>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Profile Image</h5></div>
            <div class="template-field">
                <label>Current Image</label>
                <div class="ecom-avatar-lg"><img src="{{ $user->image_url }}" alt="{{ $user->name ?: 'User' }}"></div>
            </div>
            <div class="template-field">
                <label for="user-image">Upload New Image</label>
                <input id="user-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                <div class="ecom-upload-note">JPG, PNG and WebP. Maximum 2MB.</div>
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>{{ $mode === 'create' ? 'Create User' : 'Update User' }}</button>
                <a class="tf-button style-2 w-full" href="{{ route('users.index') }}">Cancel</a>
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
@endsection
