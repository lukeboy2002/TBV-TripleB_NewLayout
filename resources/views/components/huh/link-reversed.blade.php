<a wire:navigate
        {{ $attributes->merge(["class" => "text-dark dark:text-light hover:text-orange-500 focus:outline-none focus:text-orange-500 transition duration-150 ease-in-out" ]) }}
>
    {{ $slot }}
</a>


