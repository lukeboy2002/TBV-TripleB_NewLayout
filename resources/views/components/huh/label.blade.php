@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-2 text-sm font-medium text-dark dar:text-light']) }}>
    {{ $value ?? $slot }}
</label>
