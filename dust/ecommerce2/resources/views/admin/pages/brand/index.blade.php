@extends('admin.layouts.master')
@section('title','Brand List')
@section('content')
<div class="main-content-wrap">
@include('admin.partials.alerts')
<div class="wg-box">
<div class="flex items-center justify-between mb-20"><h5>All Brands</h5><a href="{{ route('brands.create') }}" class="tf-button"><i class="icon-plus"></i> Add New</a></div>
<div class="wg-table">
<ul class="table-title flex gap20 mb-14"><li><div class="body-title">Brand</div></li><li><div class="body-title">Products</div></li><li><div class="body-title">Action</div></li></ul>
@forelse($brands as $brand)
<li class="product-item"><div class="flex items-center justify-between flex-grow">
<div class="name body-text">{{ $brand->name }}</div><div class="body-text">{{ $brand->products_count }}</div>
<div class="list-icon-function"><a href="{{ route('brands.edit',$brand) }}" class="item edit"><i class="icon-edit-3"></i></a><button type="button" class="item trash js-delete" data-action="{{ route('brands.destroy',$brand) }}" style="background:none;border:0"><i class="icon-trash-2"></i></button></div>
</div></li>
@empty<li class="product-item"><div class="body-text">No brands found.</div></li>@endforelse
</div><div class="mt-20">{{ $brands->links() }}</div>
</div></div>
@include('admin.partials.delete-modal')
@endsection
