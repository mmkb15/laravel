@props([
    'type' => 'info',
    'messages' => [],
])

@php
    $items = is_array($messages) ? $messages : [$messages];
    $items = array_values(array_filter($items, static fn ($message) => filled($message)));
@endphp

@if(count($items))
    <div {{ $attributes->merge(['class' => 'ecom-alert ecom-alert-'.$type]) }} role="alert">
        <div class="ecom-alert-body">
            @if(count($items) === 1)
                <p class="ecom-alert-text">{{ $items[0] }}</p>
            @else
                <ul class="ecom-alert-list">
                    @foreach($items as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <button type="button" class="ecom-alert-close" data-alert-close aria-label="Close">&times;</button>
    </div>
@endif
