@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-light dark:bg-dark border border-dark dark:border-light text-dark dark:text-light text-sm rounded-lg focus:ring-primary focus:border-primary dark:focus:ring-primary dark:focus:border-primary block w-full p-2 placeholder-dark dark:placeholder-light']) !!}>
