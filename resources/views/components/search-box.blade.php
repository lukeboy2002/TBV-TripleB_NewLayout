<div x-data="{ query: '{{ request('search', '') }}'}"
     x-on:keyup.enter.window="$dispatch('search',{ search : query})"
     id="search">


    <div class="flex items-center max-w-sm mx-auto">
        <x-form.label for="query" class="sr-only">Search</x-form.label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <x-heroicon-o-magnifying-glass class="size-4 text-primary"/>
            </div>
            <input x-model="query"
                   type="text"
                   id="search"
                   class="ps-10 bg-light dark:bg-dark border border-dark dark:border-light text-dark dark:text-light text-sm rounded-lg focus:ring-primary focus:border-primary dark:focus:ring-primary dark:focus:border-primary block w-full p-2 placeholder-dark dark:placeholder-light"
                   placeholder="Search..."/>
            <button type="submit"
                    class="text-light absolute end-2 bottom-2 bg-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-primary/30 font-medium rounded-lg text-xs px-1 py-1">
                <x-heroicon-o-magnifying-glass class="size-4"/>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</div>

