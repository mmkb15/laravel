@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Edit Role</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Edit</li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-add-product" action="{{ route('roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Role Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" name="name" value="{{ old('name', $role->name) }}" required>
                        @error('name')
                            <span class="tf-color-1 text-tiny">{{ $message }}</span>
                        @enderror
                    </fieldset>

                    <div class="bot flex justify-between gap10 mt-30">
                        <a href="{{ route('roles.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button type="submit" class="tf-button w208">Update Role</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
