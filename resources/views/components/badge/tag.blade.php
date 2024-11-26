<button {{ $attributes->merge (['class' => "bg-light text-dark text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-dark dark:text-light border border-dark dark:border-light"]) }}>
    <svg class="size-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
         stroke-width="1.5"
         viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5-3.9 19.5m-2.1-19.5-3.9 19.5"/>
    </svg>
    {{ $slot }}
</button>



