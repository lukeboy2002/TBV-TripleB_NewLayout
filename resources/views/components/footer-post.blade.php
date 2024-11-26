<div class="hidden lg:grid lg:gap-4 lg:grid-cols-2">
    @foreach($posts as $post)
        <div class="w-full">
            <div class="flex gap-4">
                <img src="{{ asset($post->getImage()) }}"
                     alt="{{ $post->title  }}"
                     class="max-h-32 w-full rounded-tl-lg object-top object-cover"
                />
                <div>
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="text-primary font-bold text-xl">{{ $post->shortTitle() }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>