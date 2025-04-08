@props(['active' => false, 'href' => '#', 'icon' => 'fas fa-circle'])

@php
    $classes = ($active ?? false)
        ? 'flex items-center p-2 space-x-2 rounded-lg bg-primary-700 text-white'
        : 'flex items-center p-2 space-x-2 rounded-lg hover:bg-primary-600 text-white';
@endphp

<li>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        <i class="{{ $icon }}"></i>
        <span>{{ $slot }}</span>
    </a>
</li>
