<button {{ $attributes->merge(['class' => "bg-gray-100 text-gray-700 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-menu dark:text-gray-300 flex items-center"]) }}>
    <x-heroicon-c-hashtag class="size-3 mr-1"/>{{ $slot }}
</button>