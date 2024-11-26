@props(['disabled' => false])

<textarea {!! $attributes->merge(['class' => 'block p-2.5 w-full text-sm text-dark bg-light rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500']) !!}>{{ $slot }}</textarea>


