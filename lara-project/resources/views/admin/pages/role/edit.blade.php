@extends('admin.layouts.master')


<!-- Title -->
@section('title', 'Roles - Edit')

<!-- Content -->
@section('content')
    <!-- Page Header -->
    <x-admin.phead title='Roles - Edit' subtitle='Edit Role'>
        <a class="btn-custom btn-custom-secondary btn-quick-action" href="{{ route('roles.index') }}">
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
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Text input -->
            <div class="mb-3">
                <label for="basicText" class="form-label-custom">Name</label>
                <input type="text" name="name" class="form-control-custom" id="basicText"
                    placeholder="Enter username" value="{{ old('name') ?? $role->name }}">
                    <x-admin.error-msg name="name" />

            </div>



            <div class="mb-3 text-end">
                <button type="submit" class="btn-custom btn-custom-secondary">Save</button>
            </div>
        </form>
    </div>
@endsection
