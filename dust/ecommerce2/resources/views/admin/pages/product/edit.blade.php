@extends('admin.layouts.master')
@section('title', 'Edit Product')
@section('content')
<div class="main-content-wrap">
@include('admin.partials.alerts')
<form class="tf-section-2 form-add-product" action="{{ $product->exists ? route('products.update',$product) : route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf @if($product->exists) @method('PUT') @endif
<div class="wg-box">
<fieldset><div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div><input type="text" name="name" value="{{ old('name',$product->name) }}" required></fieldset>
<div class="gap22 cols">
<fieldset><div class="body-title mb-10">Category <span class="tf-color-1">*</span></div><div class="select"><select name="category_id" required><option value="">Choose category</option>@foreach($categories as $category)<option value="{{ $category->category_id }}" @selected(old('category_id',$product->category_id)==$category->category_id)>{{ $category->name }}</option>@endforeach</select></div></fieldset>
<fieldset><div class="body-title mb-10">Brand</div><div class="select"><select name="brand_id"><option value="">No brand</option>@foreach($brands as $brand)<option value="{{ $brand->brand_id }}" @selected(old('brand_id',$product->brand_id)==$brand->brand_id)>{{ $brand->name }}</option>@endforeach</select></div></fieldset>
</div>
<fieldset><div class="body-title mb-10">Description</div><textarea name="description">{{ old('description',$product->description) }}</textarea></fieldset>
<fieldset><div class="body-title mb-10">Status</div><div class="select"><select name="is_active"><option value="1" @selected(old('is_active',$product->exists?(int)$product->is_active:1)==1)>Active</option><option value="0" @selected(old('is_active',$product->exists?(int)$product->is_active:1)==0)>Inactive</option></select></div></fieldset>
</div>
<div class="wg-box">
<h5 class="mb-20">Primary SKU</h5>
<fieldset><div class="body-title mb-10">SKU Code <span class="tf-color-1">*</span></div><input type="text" name="sku_code" value="{{ old('sku_code',$sku?->sku_code) }}" required></fieldset>
<div class="gap22 cols"><fieldset><div class="body-title mb-10">Price <span class="tf-color-1">*</span></div><input type="number" step="0.01" min="0" name="price" value="{{ old('price',$sku?->price) }}" required></fieldset>
<fieldset><div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div><input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity',$sku?->stock_quantity ?? 0) }}" required></fieldset></div>
<fieldset><div class="body-title mb-10">Product Image</div>@if($sku?->image_url)<img src="{{ asset('storage/'.$sku->image_url) }}" style="width:90px;height:90px;object-fit:cover;margin-bottom:10px" alt="">@endif<input type="file" name="sku_image" accept="image/*"></fieldset>
<div class="cols gap10"><button class="tf-button w-full" type="submit">{{ $product->exists ? 'Update Product' : 'Add Product' }}</button><a href="{{ route('products.index') }}" class="tf-button style-2 w-full">Cancel</a></div>
</div></form></div>
@endsection
