@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Ecommerce</div></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit product</div></li>
            </ul>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="tf-section-2">
                <div class="wg-box">
                    <fieldset class="mb-20">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}">
                        @error('name') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                    </fieldset>

                    <div class="flex gap20 mb-20 flex-wrap">
                        <fieldset class="flex-grow">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select name="category_id">
                                    <option value="">Choose category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                        </fieldset>

                        <fieldset class="flex-grow">
                            <div class="body-title mb-10">Status <span class="tf-color-1">*</span></div>
                            <div class="select">
                                <select name="status">
                                    <option value="Active" {{ old('status', $product->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('status', $product->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </fieldset>
                    </div>

                    <fieldset class="mb-20">
                        <div class="body-title mb-10">Vendor ID <span class="tf-color-1">*</span></div>
                        <input type="number" name="vendor_id" value="{{ old('vendor_id', $product->vendor_id) }}">
                        @error('vendor_id') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                    </fieldset>

                    <fieldset>
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea name="description">{{ old('description', $product->description) }}</textarea>
                        @error('description') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                    </fieldset>
                </div>

                <div class="wg-box">
                    <div class="body-title mb-10">Current images</div>
                    <div class="flex flex-wrap gap10 mb-20">
                        @forelse ($product->images as $img)
                            <img src="{{ asset('storage/' . $img->image) }}" alt=""
                                 style="width:90px; height:90px; object-fit:cover; border-radius:8px; border:1px solid #ECF0F4;">
                        @empty
                            <div class="text-tiny">No images uploaded yet.</div>
                        @endforelse
                    </div>

                    <div class="body-title mb-10">Add more images</div>
                    <div class="upload-image">
                        <div class="item up-load">
                            <label class="uploadfile" for="productImages">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text">
                                    Drop images here or <span class="tf-color">click to browse</span>
                                </span>
                                <input type="file" id="productImages" name="images[]" accept="image/*" multiple onchange="previewProductImages(event)">
                            </label>
                        </div>
                    </div>
                    <div id="imagePreviewGrid" class="flex flex-wrap gap10 mt-14"></div>
                    @error('images.*') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror

                    <div class="flex gap10 mt-20">
                        <button type="submit" class="tf-button w-full">Update product</button>
                        <a href="{{ route('products.index') }}" class="tf-button style-2 w-full">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewProductImages(event) {
        var files = event.target.files;
        var grid = document.getElementById('imagePreviewGrid');
        grid.innerHTML = '';

        Array.from(files).forEach(function (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '90px';
                img.style.height = '90px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '8px';
                img.style.border = '1px solid #ECF0F4';
                grid.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endsection
