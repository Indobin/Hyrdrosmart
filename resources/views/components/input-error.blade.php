@props(['messages'])

@if ($messages)
    <label {{ $attributes->merge(['class' => 'text-sm text-red-600 mt-1 block']) }}>
        @foreach ((array) $messages as $message)
            <div class="leading-tight">{{ $message }}</div>
        @endforeach
    </label>
@endif
