@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block w-full ps-3 pe-4 py-2 text-start text-base font-medium text-primary focus:outline-none transition duration-150 ease-in-out'
                : 'block w-full ps-3 pe-4 py-2 text-start text-base font-medium text-light/60 hover:text-primary focus:outline-none focus:text-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
