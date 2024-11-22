<div x-data="{ query: '{{ request('search', '') }}'}"
     x-on:keyup.enter.window="$dispatch('search',{ search : query})"
     id="search">


    <div class="flex items-center max-w-sm mx-auto">
        <x-form.label for="query" class="sr-only">Search</x-form.label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <x-heroicon-o-magnifying-glass class="size-4 text-orange-500"/>
            </div>
            <input x-model="query"
                   type="text"
                   id="search"
                   class="block w-full p-4 ps-10 text-sm text-dark border border-light/60 rounded-lg bg-light focus:ring-orange-500 focus:border-orange-500"
                   placeholder="Search..."/>
            <button type="submit"
                    class="text-light absolute end-2.5 bottom-2.5 bg-primary hover:bg-primary/80 focus:ring-4 focus:outline-none focus:ring-primary/30 font-medium rounded-lg text-sm px-2 py-2">
                <x-heroicon-o-magnifying-glass class="size-4"/>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</div>

