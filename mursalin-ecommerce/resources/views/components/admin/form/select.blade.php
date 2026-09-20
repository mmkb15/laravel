@props(['label', 'name', 'class' => 'col-md-6'])


<div class="{{ $class }}">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <select class="form-select" id="{{ $name }}" name="{{ $name }}">
        <option selected disabled>Select {{ strtolower($label) }}</option>
        {{ $slot }}
    </select>
    <x-admin.error-message name="{{ $name }}" />
</div>
