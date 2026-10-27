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
        <span class="ecom-alert-icon" aria-hidden="true">
            @switch($type)
                @case('success')
                    <svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></svg>
                    @break
                @case('deleted')
                    <svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2m3 0-1 14H6L5 6m4 4v6m6-6v6" /></svg>
                    @break
                @case('error')
                    <svg viewBox="0 0 24 24"><path d="m18 6-12 12M6 6l12 12" /></svg>
                    @break
                @case('warning')
                    <svg viewBox="0 0 24 24"><path d="M12 9v4m0 4h.01M10.3 3.9 1.8 18.6A1.6 1.6 0 0 0 3.2 21h17.6a1.6 1.6 0 0 0 1.4-2.4L13.7 3.9a2 2 0 0 0-3.4 0Z" /></svg>
                    @break
                @default
                    <svg viewBox="0 0 24 24"><path d="M12 16v-4m0-4h.01M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z" /></svg>
            @endswitch
        </span>
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
        <button type="button" class="ecom-alert-close" data-alert-close aria-label="Close notification">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m18 6-12 12M6 6l12 12" /></svg>
        </button>
    </div>
@endif
