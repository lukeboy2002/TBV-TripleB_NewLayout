@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-light dark:bg-dark border border-dark dark:border-light text-dark dark:text-light text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 dark:focus:ring-orange-500 dark:focus:border-orange-500 block w-full p-2 placeholder-dark dark:placeholder-light']) !!}>
