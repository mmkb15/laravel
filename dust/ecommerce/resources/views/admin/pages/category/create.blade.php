@extends('admin.layouts.master')

@section('title', 'New Category')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category information</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('categories.index') }}"><div class="text-tiny">Category</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">New category</div></li>
            </ul>
        </div>

        <div class="wg-box">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="form-new-product form-style-1">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Category name <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="Category name" name="name" value="{{ old('name') }}">
                    @error('name') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                </fieldset>

                <fieldset>
                    <div class="body-title">Upload image</div>
                    <div class="upload-image flex-grow">
                        <div class="item up-load" id="uploadBox" style="position:relative; overflow:hidden;">
                            <label class="uploadfile" for="myFile">
                                <span class="icon" id="uploadIcon"><i class="icon-upload-cloud"></i></span>
                                <span class="body-text" id="uploadText">
                                    Drop your image here or select <span class="tf-color">click to browse</span>
                                </span>
                                <input type="file" id="myFile" name="image" accept="image/*" onchange="previewCategoryImage(event)">
                            </label>
                            <img id="imagePreview" src="#" alt="Preview"
                                 style="display:none; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); max-width:90%; max-height:90%; object-fit:contain; border-radius:12px;">
                        </div>
                    </div>
                    @error('image') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                </fieldset>

                <fieldset class="category">
                    <div class="body-title">Parent category</div>
                    <div class="select flex-grow">
                        <select name="parent_id">
                            <option value="">-- None --</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="body-title">Description</div>
                    <textarea class="flex-grow" name="description" placeholder="Short description">{{ old('description') }}</textarea>
                </fieldset>

                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewCategoryImage(event) {
        var file = event.target.files[0];
        var preview = document.getElementById('imagePreview');
        var icon = document.getElementById('uploadIcon');
        var text = document.getElementById('uploadText');

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                icon.style.display = 'none';
                text.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
