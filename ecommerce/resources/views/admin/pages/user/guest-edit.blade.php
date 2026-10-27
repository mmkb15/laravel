@extends('admin.layouts.master')

@section('title', 'Edit Guest Customer')

@section('link')
    <link rel="stylesheet" href="https://unpkg.com/filepond@4.32.12/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection

@section('content')
<div class="main-content-wrap">
    <div class="ecom-page-header">
        <h3>Edit Guest Customer</h3>
        <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
            <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><a href="{{ route('users.guests') }}"><div class="text-tiny">Guest Customers</div></a></li>
            <li><i class="icon-chevron-right"></i></li>
            <li><div class="text-tiny">Edit Guest Customer</div></li>
        </ul>
    </div>

    <form class="template-form two-col" method="POST" action="{{ route('users.guests.update', $guestCustomer) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-card">
            <div class="form-card-title"><i class="icon-user"></i><h5>User Information</h5></div>
            <div class="template-field">
                <label for="name">Full Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name', $guestCustomer->name) }}" required>
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="template-field">
                <label for="email">Email Address</label>
                <input id="email" class="template-input" type="email" name="email" value="{{ old('email', $guestCustomer->email) }}">
                @error('email')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-grid-2">
                <div class="template-field">
                    <label for="phone">Phone <span class="required">*</span></label>
                    <input id="phone" class="template-input" type="tel" name="phone" value="{{ old('phone', $guestCustomer->phone) }}" required>
                    @error('phone')<div class="field-error">{{ $message }}</div>@enderror
                </div>
                <div class="template-field">
                    <label>Customer Type</label>
                    <div class="template-select">
                        <select aria-label="Customer type" disabled>
                            <option selected>Guest Customer</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="template-field">
                <label for="address">Address</label>
                <textarea id="address" name="address">{{ old('address', $guestCustomer->address) }}</textarea>
                @error('address')<div class="field-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-title"><i class="icon-image"></i><h5>Profile Image</h5></div>
            <div class="template-field">
                <label>Current Image</label>
                <div class="ecom-avatar-lg"><img src="{{ $guestCustomer->image_url }}" alt="{{ $guestCustomer->name }}"></div>
            </div>
            <div class="template-field">
                <label for="guest-customer-image">Upload New Image</label>
                <input id="guest-customer-image" class="filepond" type="file" name="image" accept="image/png,image/jpeg,image/webp">
                <div class="ecom-upload-note">JPG, PNG and WebP. Maximum 2MB.</div>
                @error('image')<div class="field-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit">Update Guest Customer</button>
                <a class="tf-button style-2 w-full" href="{{ route('users.guests') }}">Cancel</a>
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
            FilePond.create(document.querySelector('#guest-customer-image'), {
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
