<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-dark border border-transparent rounded-md font-semibold text-xs text-light uppercase tracking-widest hover:border-primary focus:border-primary active:border-primary dark:hover:border-light dark:focus:border-light dark:active:border-light disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
