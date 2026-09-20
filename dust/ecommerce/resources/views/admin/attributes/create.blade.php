@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Add New Attribute</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('attributes.index') }}">Attributes</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Add New</li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-add-product" action="{{ route('attributes.store') }}" method="POST" id="attribute-form">
                @csrf
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Attribute Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Color, Size" required>
                        @error('name') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                    </fieldset>

                    <fieldset class="values">
                        <div class="body-title mb-10">Attribute Values <span class="tf-color-1">*</span></div>
                        <div id="value-rows">
                            <div class="gap10 cols mb-10 value-row">
                                <input type="text" name="values[]" placeholder="e.g. Red" required>
                            </div>
                        </div>
                        <button type="button" id="add-value" class="tf-button style-1 w208 mt-10">+ Add Another Value</button>
                        @error('values') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                    </fieldset>

                    <div class="bot flex justify-between gap10 mt-30">
                        <a href="{{ route('attributes.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button type="submit" class="tf-button w208">Save Attribute</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    document.getElementById('add-value').addEventListener('click', function () {
        const wrap = document.getElementById('value-rows');
        const row = document.createElement('div');
        row.className = 'gap10 cols mb-10 value-row';
        row.innerHTML = '<input type="text" name="values[]" placeholder="e.g. Blue">';
        wrap.appendChild(row);
    });
</script>
@endsection
