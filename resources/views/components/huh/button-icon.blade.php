<button {{ $attributes->merge(['type' => 'button', 'class'=>'text-white focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center me-2 transition ease-in-out duration-150']) }}>

    {{ $slot }}
</button>