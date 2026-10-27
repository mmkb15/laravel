@extends('admin.layouts.master')

@section('title', 'Add Brand')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add new brand</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('brands.index') }}"><div class="text-tiny">Brand</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Add new</div></li>
            </ul>
        </div>

        <div class="wg-box">
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data" class="form-style-1">
                @csrf

                <fieldset>
                    <div class="body-title mb-10">Brand Name <span class="tf-color-1">*</span></div>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter brand name">
                    @error('name') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                </fieldset>

                <fieldset>
                    <div class="body-title mb-10">Status <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="status">
                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="body-title mb-10">Brand Logo</div>
                    <div class="upload-image">
                        <div class="item up-load" id="uploadBox" style="position:relative; overflow:hidden;">
                            <label class="uploadfile" for="image">
                                <span class="icon" id="uploadIcon"><i class="icon-upload-cloud"></i></span>
                                <div class="text-tiny" id="uploadText">Drop your image here or click to browse</div>
                                <input type="file" id="image" name="image" accept="image/*" onchange="previewBrandImage(event)">
                            </label>
                            <img id="imagePreview" src="#" alt="Preview"
                                 style="display:none; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); max-width:90%; max-height:90%; object-fit:contain; border-radius:12px;">
                        </div>
                    </div>
                    @error('image') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
                </fieldset>

                <button type="submit" class="tf-button w200">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    function previewBrandImage(event) {
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
