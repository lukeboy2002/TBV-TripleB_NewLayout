<x-heading>Tags</x-heading>
<div class="flex flex-wrap gap-2">
    @foreach ($tags as $tag)
        <x-badge-tag
                wire:navigate
                href="{{ route('posts.index', ['tag' => $tag->slug]) }}">
            {{ $tag->name }}
        </x-badge-tag>
    @endforeach

</div>