@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-light border border-gray-300 text-dark text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5']) !!}>



