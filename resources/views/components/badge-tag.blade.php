<button {{ $attributes->merge(['class' => "bg-light text-dark text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-dark dark:text-light flex items-center"]) }}>
    <x-heroicon-c-hashtag class="size-3 mr-1"/>{{ $slot }}
</button>