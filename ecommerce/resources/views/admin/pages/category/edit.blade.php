@extends('admin.layouts.master')

@section('title', 'Add Category')

@section('content')
<div class="main-content-wrap">
    <div class="wg-box">
        <h5 class="mb-20">Add New Category</h5>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-style-1">
        @csrf
        @method('PUT')
        <fieldset>
            <div class="body-title mb-10">Category Name <span class="tf-color-1">*</span></div>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </fieldset>
        <fieldset>
            <div class="body-title mb-10">Parent Category</div>
            <div class="select">
                <select name="parent_id">
                    <option value="">-- None --</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </fieldset>
        <fieldset>
            <div class="body-title mb-10">Description</div>
            <textarea name="description">{{ old('description', $category->description) }}</textarea>
        </fieldset>
        <button type="submit" class="tf-button w200">Update</button>
    </form>
    </div>
</div>
@endsection