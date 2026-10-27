@extends('admin.layouts.master')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">

        <div class="flex items-center justify-between flex-wrap gap20 mb-27">
            <h3>Add New Coupon</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('coupons.index') }}">Coupons</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Add New</li>
            </ul>
        </div>

        <div class="wg-box">
            <form class="form-add-product" action="{{ route('coupons.store') }}" method="POST">
                @csrf
                <div class="wg-box">
                    <div class="gap22 cols">
                        <fieldset class="code">
                            <div class="body-title mb-10">Coupon Code <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" name="code" value="{{ old('code') }}" placeholder="e.g. SAVE20" required>
                            @error('code') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                        </fieldset>

                        <fieldset class="type">
                            <div class="body-title mb-10">Type <span class="tf-color-1">*</span></div>
                            <select class="mb-10" name="type" required>
                                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percentage</option>
                            </select>
                        </fieldset>
                    </div>

                    <div class="gap22 cols">
                        <fieldset class="value">
                            <div class="body-title mb-10">Value <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="number" step="0.01" name="value" value="{{ old('value') }}" required>
                            @error('value') <span class="tf-color-1 text-tiny">{{ $message }}</span> @enderror
                        </fieldset>

                        <fieldset class="min_order">
                            <div class="body-title mb-10">Minimum Order Amount</div>
                            <input class="mb-10" type="number" step="0.01" name="min_order" value="{{ old('min_order') }}">
                        </fieldset>
                    </div>

                    <div class="gap22 cols">
                        <fieldset class="max_uses">
                            <div class="body-title mb-10">Max Uses</div>
                            <input class="mb-10" type="number" name="max_uses" value="{{ old('max_uses') }}" placeholder="Leave blank for unlimited">
                        </fieldset>

                        <fieldset class="expires_at">
                            <div class="body-title mb-10">Expires At</div>
                            <input class="mb-10" type="date" name="expires_at" value="{{ old('expires_at') }}">
                        </fieldset>
                    </div>

                    <fieldset class="status">
                        <div class="body-title mb-10">Status</div>
                        <select class="mb-10" name="status">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </fieldset>

                    <div class="bot flex justify-between gap10 mt-30">
                        <a href="{{ route('coupons.index') }}" class="tf-button style-1 w208">Cancel</a>
                        <button type="submit" class="tf-button w208">Save Coupon</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
