@extends('admin.layouts.master')

@section('title', 'My Profile')

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>My Profile</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Profile</div></li>
        </ul>
    </div>

    @if($errors->any())<div class="alert alert-danger mb-20">{{ $errors->first() }}</div>@endif

    <form class="template-form two-col" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-card">
            <div class="form-card-title"><i class="icon-user"></i><h5>Account Information</h5></div>
            <div class="template-field">
                <label for="name">Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name',$user->name) }}" required>
            </div>
            <div class="template-field">
                <label for="email">Email</label>
                <input id="email" class="template-input" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="phone">Phone</label>
                    <input id="phone" class="template-input" type="tel" name="phone" value="{{ old('phone',$user->phone) }}">
                </div>
                <div class="template-field">
                    <label for="role">Role</label>
                    <input id="role" class="template-input" value="{{ ucfirst($user->role) }}" disabled>
                </div>
            </div>
            <div class="template-field">
                <label for="address">Address</label>
                <textarea id="address" name="address">{{ old('address',$user->address) }}</textarea>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Profile Image & Security</h5></div>
            <div class="template-field">
                <label>Current Image</label>
                <div class="ecom-avatar-lg"><img src="{{ $user->image_url }}" alt="{{ $user->name }}"></div>
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
                <a class="tf-button style-2 w-full" href="{{ route('dashboard') }}">Back to Dashboard</a>
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
@endsection
