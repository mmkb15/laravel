@extends('admin.layouts.master')
@section('title','Edit Brand')
@section('content')
<div class="main-content-wrap"><div class="wg-box"><h5 class="mb-20">Edit Brand</h5>
<form action="{{ route('brands.update',$brand) }}" method="POST" class="form-style-1">@csrf @method('PUT')
<fieldset><div class="body-title mb-10">Brand Name <span class="tf-color-1">*</span></div><input type="text" name="name" value="{{ old('name', '') }}" required></fieldset>
<div class="cols gap10"><button class="tf-button w200" type="submit">Save</button><a class="tf-button style-2 w200" href="{{ route('brands.index') }}">Cancel</a></div>
</form></div></div>
@endsection
