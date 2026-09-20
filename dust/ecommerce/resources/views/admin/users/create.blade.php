@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Add New User</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Add New</li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-add-product" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="wg-box">
                    <div class="gap22 cols">
                        <fieldset class="name">
                            <div class="body-title mb-10">Name <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" name="name" value="{{ old('name') }}" required>
                            @error('name') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                        </fieldset>

                        <fieldset class="email">
                            <div class="body-title mb-10">Email <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="email" name="email" value="{{ old('email') }}" required>
                            @error('email') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                        </fieldset>
                    </div>

                    <div class="gap22 cols">
                        <fieldset class="password">
                            <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="password" name="password" required>
                            @error('password') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                        </fieldset>

                        <fieldset class="password_confirmation">
                            <div class="body-title mb-10">Confirm Password <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="password" name="password_confirmation" required>
                        </fieldset>
                    </div>

                    <fieldset class="role">
                        <div class="body-title mb-10">Role</div>
                        <select class="mb-10" name="role_id">
                            <option value="">-- Select Role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <div class="bot flex justify-between gap10 mt-30">
                        <a href="{{ route('users.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button type="submit" class="tf-button w208">Save User</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
