<button {{ $attributes->merge(['type' => 'type', 'class' => 'inline-flex items-center px-1 py-1 border rounded-md focus:bg-primary focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
