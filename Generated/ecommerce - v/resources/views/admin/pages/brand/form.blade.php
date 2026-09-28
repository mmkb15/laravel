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

    @if($errors->any())<div class="alert alert-danger mb-20">{{ $errors->first() }}</div>@endif

    <form class="template-form two-col" method="POST" action="{{ $mode === 'create' ? route('brands.store') : route('brands.update',$brand) }}">
        @csrf @if($mode === 'edit') @method('PUT') @endif
        <div class="form-card">
            <div class="form-card-title"><i class="icon-box"></i><h5>Brand Information</h5></div>
            <div class="template-field">
                <label for="name">Brand Name <span class="required">*</span></label>
                <input id="name" class="template-input" type="text" name="name" value="{{ old('name',$brand->name) }}" placeholder="Enter brand name" required>
            </div>
            <div class="template-field">
                <label for="status">Status <span class="required">*</span></label>
                <div class="template-select">
                    <select id="status" name="status" required>
                        <option value="active" @selected(old('status',$brand->status ?: 'active') === 'active')>Active</option>
                        <option value="inactive" @selected(old('status',$brand->status) === 'inactive')>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-title"><i class="icon-file-text"></i><h5>Description</h5></div>
            <div class="template-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Write brand description...">{{ old('description',$brand->description) }}</textarea>
            </div>
            <div class="form-actions">
                <button class="tf-button w-full" type="submit"><i class="icon-check"></i>{{ $mode === 'create' ? 'Create Brand' : 'Update Brand' }}</button>
                <a class="tf-button style-2 w-full" href="{{ route('brands.index') }}">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
