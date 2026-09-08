@extends('admin.layouts.master')


<!-- Title -->
@section('title', 'Products - Create')

<!-- Content -->
@section('content')
    <!-- Page Header -->
    <x-admin.phead title='Product - Create' subtitle='Create a New User'>
        <a class="btn-custom btn-custom-secondary btn-quick-action" href="{{ route('products.index') }}">
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
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            {{-- {{ $errors }} --}}

            <div class="row g-3">
                <div class="col-lg-4 col-sm-6 col-12">
                    <label for="basicText" class="form-label-custom">Name</label>
                    <input type="text" name="name" class="form-control-custom" id="basicText"
                        placeholder="Enter username" value="{{ old('name') }}">
                    <x-admin.error-msg name="name" />
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Price</label>
                    <input type="number" name="price" class="form-control-custom" value="{{ old('price') }}">
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Qty</label>
                    <input type="number" name="qty" class="form-control-custom" value="{{ old('qty') }}">
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Reorder Level</label>
                    <input type="number" name="reorder" class="form-control-custom" value="{{ old('reorder') }}">
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Category</label>
                    <select name="category_id" class="form-select-custom">
                        <option value="0" selected disabled>Select one...</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}" 
                            @selected(old('category_id') == $item->id)>{{ $item->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Brand</label>
                    <select name="brand_id" class="form-select-custom">
                        <option value="0" selected disabled>Select one...</option>
                        @foreach ($brands as $item)
                        <option value="{{ $item->id }}" 
                            @selected(old('brand_id') == $item->id)>{{ $item->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Desc</label>
                    <textarea name="desc" class="form-control" rows="3" {{ old('desc') }}></textarea>
                </div>


                
                <div class="col-lg-4 col-sm-6 col-12">
                    <label class="form-label-custom">Product Image</label>
                    <input type="file" name="image" class="form-control-custom" {{ old('image') }}>
                    {{-- error msg --}}
                    <x-admin.error-msg name="image" />
                </div>


                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="form-switch-custom">
                        <input class="form-switch-input-custom" type="checkbox" id="switchOne" checked="">
                        <label class="form-switch-label" for="switchOne">Active</label>
                    </div>
                </div>
            </div>

            <div class="mb-3 text-end">
                <button type="submit" class="btn-custom btn-custom-secondary">Save</button>
            </div>
        </form>
    </div>
@endsection
