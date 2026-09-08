@extends('admin.layouts.master')


<!-- Title -->
@section('title', 'Users - Edit')

<!-- Content -->
@section('content')
    <!-- Page Header -->
    <x-admin.phead title='Users - Edit' subtitle='Edit User Information'>
        <a class="btn-custom btn-custom-secondary btn-quick-action" href="{{ route('users.index') }}">
            <i class="bi bi-plus-lg"></i> Back
        </a>
    </x-admin.phead>
    
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-12">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Text input -->
            <div class="mb-3">
                <label for="basicText" class="form-label-custom">Name</label>
                <input type="text" name="name" class="form-control-custom" id="basicText"
                    placeholder="Enter username" value="{{ $user->name }}">
                    <x-admin.error-msg name="name" />

            </div>

            <!-- Email input -->
            <div class="mb-3">
                <label class="form-label-custom">Email Address</label>
                <input type="text" name="email" class="form-control-custom" placeholder="name@example.com"
                value="{{ $user->email }}">
                <x-admin.error-msg name="email" />
            </div>

            <!-- Role input -->
            <div class="mb-3">
                <label class="form-label-custom">Role</label>
                <select name="role_id" class="form-select-custom">
                    <option value="0" selected disabled>Select Role</option>
                    @foreach ( $roles as $item )
                        
                    <option value="{{ $item->id }}"
                        @selected($user->role_id == $item->id)>{{ $item->name}}</option>
                    @endforeach
                </select>
                <x-admin.error-msg name="role_id" />
            </div>


            <div class="mb-3 text-end">
                <button type="submit" class="btn-custom btn-custom-secondary">Update</button>
            </div>
        </form>
    </div>
@endsection
