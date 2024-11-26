<a wire:navigate
        {{ $attributes->merge(["class" => "text-primary hover:text-dark dark:hover:text-light focus:outline-none focus:text-dark dark:focus:text-light transition duration-150 ease-in-out" ]) }}
>
    {{ $slot }}
</a>


