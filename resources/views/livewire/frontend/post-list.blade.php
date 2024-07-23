<div>
    <div class="flex justify-end items-center space-x-4 mb-4">
        <button class="{{ $sort === "desc" ? "flex items-center text-orange-500 border-b border-orange-500" : "flex items-center text-gray-500 dark:text-gray-400" }} py-1"
                wire:click="setSort('desc')"
        >
            <x-heroicon-s-bars-arrow-down class="mr-2 size-4"/>
            {{ __('Latest') }}
        </button>
        <button class="{{ $sort === "asc" ? "flex items-center text-orange-500 border-b border-orange-500" : "flex items-center text-gray-500 dark:text-gray-400" }} py-1"
                wire:click="setSort('asc')"
        >
            <x-heroicon-s-bars-arrow-up class="mr-2 size-4"/>
            {{ __('Oldest') }}
        </button>

        <div class="flex items-center space-x-2 text-xs text-gray-700 dark:text-gray-50">
            <x-search/>
        </div>
    </div>
    <x-card>
        @foreach($this->posts as $post)
            <div class="col-span-1 space-y-3 p-2">
                <header>
                    <img src="{{ asset($post->getImage()) }}"
                         alt="{{ $post->title }}"
                         class="h-48 w-full object-cover object-top my-6"
                    />
                    <x-link-reversed href="{{route('posts.show', $post->id) }}"
                                     class="font-heading tracking-wide text-xl font-bold uppercase">
                        {{ $post->title }}
                    </x-link-reversed>
                </header>
                <div class="flex justify-between items-center uppercase text-sm text-gray-500">
                    <div class="flex space-x-4 ">
                        <div>BY <span class="text-orange-500 font-semibold">{{ $post->author->username }}</span></div>
                        <div>{{ $post->getFormattedDate() }}</div>
                    </div>
                    <div>
                        {{ $post->comments->count() }} Comment(s)
                    </div>
                </div>
                <article>
                    {!! $post->shortBody() !!}
                </article>
                <footer class="flex justify-end">
                    <x-link href="{{route('posts.show', $post->id)}}" class="inline-flex items-center">
                        read more
                        <x-heroicon-o-arrow-right-circle class="ml-1 size-4"/>
                    </x-link>
                </footer>
            </div>
        @endforeach
    </x-card>

    <div class="pt-6">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>