<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-600 hover:bg-orange-600 focus:outline-none focus:bg-orange-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
