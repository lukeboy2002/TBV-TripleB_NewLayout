@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 uppercase text-primary focus:outline-none transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 uppercase text-light/60 hover:text-orange-500 focus:outline-none focus:text-primary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
