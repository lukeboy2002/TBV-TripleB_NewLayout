<div class="col-span-1 px-2">
    <header>
        <img src={{ $post->getImage() }}
             alt="{{ $post->title}}"
             class="h-48 w-full object-cover object-top my-6"
        />
        <div class="flex justify-between items-center space-y-2 text-xs">
            <a href="#" class="bg-red-500 text-white">Categories</a>
            <div>{{ $post->likes_count }} Likes</div>
        </div>
        <x-link-primary class="text-xl" href="{{ route('posts.show', $post->id) }}">
            {{ $post->title }}
        </x-link-primary>
    </header>
    <main>
        <div class="my-4 flex justify-between items-center uppercase text-xs text-gray-500">
            <div class="flex space-x-4 ">
                <div>BY <span class="text-orange-500 font-semibold">{{ $post->author->username }}</span></div>
                <div>{{ $post->getFormattedDate() }}</div>
            </div>
            <div>
                {{  $post->comments_count }} Comments
            </div>
        </div>
        <div class="prose prose-sm max-w-none">
            {{ $post->shortBody() }}
        </div>

    </main>
    <footer class="flex justify-end mt-4">
        <a href="{{ route('posts.show', $post->id) }}"
           class="inline-flex items-center text-orange-500 hover:text-gray-600 focus:outline-none focus:text-gray-600 transition duration-150 ease-in-out">
            Read More
            <x-heroicon-o-arrow-right-circle class="ml-1 size-4"/>
        </a>
    </footer>
</div>


