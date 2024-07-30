@props(['disabled' => false])

<textarea {!! $attributes->merge(['class' => 'block p-2.5 w-full text-sm text-gray-700 bg-gray-50 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500']) !!}>{{ $slot }}</textarea>


