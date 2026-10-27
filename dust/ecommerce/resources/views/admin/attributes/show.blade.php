@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Attribute Details</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('attributes.index') }}">Attributes</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Details</li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="mb-14"><span class="body-title">Name:</span> <span class="body-text">{{ $attribute->name }}</span></div>
            <div class="mb-14">
                <span class="body-title">Values:</span>
                <span class="body-text">
                    @forelse ($attribute->values as $value)
                        <span class="badge">{{ $value->value }}</span>@if (!$loop->last), @endif
                    @empty
                        -
                    @endforelse
                </span>
            </div>

            <a href="{{ route('attributes.index') }}" class="tf-button style-1 w208 mt-20">Back</a>
        </div>

    </div>
</div>
@endsection
