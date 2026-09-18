@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#"><div class="text-tiny">Ecommerce</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Add product</div></li>
            </ul>
        </div>

        <form class="tf-section-2 form-add-product" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="wg-box">
                {{-- Product Name --}}
                <fieldset class="name">
                    <div class="body-title mb-10">
                        Product name <span class="tf-color-1">*</span>
                    </div>
                    <input class="mb-10 @error('name') is-invalid @enderror"
                        type="text" placeholder="Enter product name"
                        name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-tiny" style="color:red;">{{ $message }}</div>
                    @enderror
                    <div class="text-tiny">Do not exceed 255 characters when entering the product name.</div>
                </fieldset>

                {{-- Category & Status --}}
                <div class="gap22 cols">
                    <fieldset class="category">
                        <div class="body-title mb-10">
                            Category <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select name="category_id" class="@error('category_id') is-invalid @enderror">
                                <option value="">Choose category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="text-tiny" style="color:red;">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    <fieldset class="male">
                        <div class="body-title mb-10">
                            Status <span class="tf-color-1">*</span>
                        </div>
                        <div class="select">
                            <select name="status">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </fieldset>
                </div>

                {{-- Vendor ID --}}
                <fieldset class="brand">
                    <div class="body-title mb-10">
                        Vendor ID <span class="tf-color-1">*</span>
                    </div>
                    <input class="@error('vendor_id') is-invalid @enderror"
                        type="number" placeholder="Enter vendor ID"
                        name="vendor_id" value="{{ old('vendor_id') }}" required>
                    @error('vendor_id')
                        <div class="text-tiny" style="color:red;">{{ $message }}</div>
                    @enderror
                </fieldset>

                {{-- Description --}}
                <fieldset class="description">
                    <div class="body-title mb-10">
                        Description <span class="tf-color-1">*</span>
                    </div>
                    <textarea class="mb-10" name="description"
                        placeholder="Description">{{ old('description') }}</textarea>
                </fieldset>
            </div>

            <div class="wg-box">
                {{-- Image Upload --}}
                <fieldset>
                    <div class="body-title mb-10">Upload image</div>
                    <div class="upload-image mb-16">
                        <div class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="text-tiny">
                                    Drop your image here or <span class="tf-color">click to browse</span>
                                </span>
                                <input type="file" id="myFile" name="image">
                            </label>
                        </div>
                    </div>
                </fieldset>

                {{-- Submit Buttons --}}
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Add product</button>
                    <a href="{{ route('products.index') }}" class="tf-button style-2 w-full">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection