@extends('admin.layouts.master')
@section('title','Edit Category')
@section('content')
<div class="main-content-wrap">
    @include('admin.partials.alerts')
    <div class="wg-box">
        <h5 class="mb-20">Edit Category</h5>
        <form action="{{ route('categories.update',$category) }}" method="POST" class="form-style-1">
            @csrf @method('PUT')
            <fieldset><div class="body-title mb-10">Category Name <span class="tf-color-1">*</span></div><input type="text" name="name" value="{{ old('name',$category->name) }}" required></fieldset>
            <fieldset><div class="body-title mb-10">Parent Category</div><div class="select"><select name="parent_id"><option value="">-- None --</option>@foreach($parents as $parent)<option value="{{ $parent->category_id }}" @selected(old('parent_id',$category->parent_id)==$parent->category_id)>{{ $parent->name }}</option>@endforeach</select></div></fieldset>
            <fieldset><div class="body-title mb-10">Description</div><textarea name="description">{{ old('description',$category->description) }}</textarea></fieldset>
            <div class="cols gap10"><button class="tf-button w200" type="submit">Update</button><a class="tf-button style-2 w200" href="{{ route('categories.index') }}">Cancel</a></div>
        </form>
    </div>
</div>
@endsection
