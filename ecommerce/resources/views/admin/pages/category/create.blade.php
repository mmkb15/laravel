@extends('admin.layouts.master')

@section('title', 'Add Category')

@section('content')
<div class="main-content-wrap">
    <div class="wg-box">
        <h5 class="mb-20">Add New Category</h5>

        <form action="{{ route('categories.store') }}" method="POST" class="form-style-1">
            @csrf
            <fieldset>
                <div class="body-title mb-10">Category Name <span class="tf-color-1">*</span></div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter category name">
                @error('name') <div class="text-tiny tf-color-1">{{ $message }}</div> @enderror
            </fieldset>

            <fieldset>
                <div class="body-title mb-10">Parent Category</div>
                <div class="select">
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
                <div class="body-title mb-10">Description</div>
                <textarea name="description">{{ old('description') }}</textarea>
            </fieldset>

            <button type="submit" class="tf-button w200">Save</button>
        </form>
    </div>
</div>
@endsection