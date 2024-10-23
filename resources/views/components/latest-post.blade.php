<x-heading>Latest Post</x-heading>

<div class="flex flex-col justify-between space-y-10">
    @foreach($posts as $post)
        <div class="flex justify-between space-x-2">
            <div class="w-1/4">
                <img src="{{ asset($post->getImage()) }}"
                     alt="{{ $post->title  }}"
                     class="object-fit size-16"
                />
            </div>
            <div class="w-3/4">
                <x-link-primary href="" class="flex items-start uppercase text-sm font-semibold">
                    {{ $post->shortTitle() }}
                </x-link-primary>
            </div>
        </div>
    @endforeach
</div>