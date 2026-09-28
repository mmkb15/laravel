@props(['label', 'name', 'value' => null, 'placeholder' => null, 'class' => 'col-md-6', 'rows' => "4"])

<div class="{{ $class }}">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <textarea class="form-control" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}">{{ $value }}</textarea>
</div>
