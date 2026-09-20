@props(['label', 'type' => 'text', 'name', 'value' => null, 'placeholder' => null, 'class' => 'col-md-6'])

<div class="{{ $class }}">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <div class="input-group">
        @if ($slot->hasActualContent())
            <span class="input-group-text">{{ $slot }}</span>
        @endif
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" value="{{ $value }}">
    </div>
    <x-admin.error-message name="{{ $name }}" />
</div>
