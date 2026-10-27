@extends('admin.layouts.master')

@section('title', 'Category Details')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Category details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ url('/') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('categories.index') }}"><div class="text-tiny">Category</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">{{ $category->name }}</div></li>
            </ul>
        </div>

        <div class="wg-box">
            @if ($category->image)
                <div class="mb-20">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width:220px; border-radius:12px;">
                </div>
            @endif
            <div class="mb-14"><span class="body-title">Name: </span><span class="body-text">{{ $category->name }}</span></div>
            <div class="mb-14"><span class="body-title">Parent: </span><span class="body-text">{{ $category->parent->name ?? '-' }}</span></div>
            <div class="mb-14"><span class="body-title">Description: </span><span class="body-text">{{ $category->description ?: '-' }}</span></div>
            <div class="mb-20"><span class="body-title">Created: </span><span class="body-text">{{ $category->created_at->format('d M Y') }}</span></div>
            <a href="{{ route('categories.edit', $category->id) }}" class="tf-button w208">Edit</a>
            <a href="{{ route('categories.index') }}" class="tf-button style-2 w208">Back</a>
        </div>
    </div>
</div>
@endsection
