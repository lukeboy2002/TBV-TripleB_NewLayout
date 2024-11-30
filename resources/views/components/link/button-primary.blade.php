<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-light uppercase tracking-widest hover:border-dark focus:border-dark active:border-dark dark:hover:border-light dark:focus:border-light dark:active:border-light focus:outline-none disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
