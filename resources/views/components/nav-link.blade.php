@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'py-2 flex font-semibold items-center rounded-lg px-4 w-[92%] mx-auto focus:outline-none bg-green-600 focus:border-green-700 transition duration-300 ease-in-out'
                : 'py-2 flex font-semibold items-center rounded-lg px-4 w-[92%] mx-auto hover:bg-green-600 hover:border-green-300 focus:outline-none focus:border-green-300 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

