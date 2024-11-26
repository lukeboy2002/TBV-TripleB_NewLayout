<div class="flex items-center space-x-4 text-sm pt-1">
    @auth
        @if($isLiked)
            <button wire:click="toggleLike" class="flex items-center text-red-800 dark:text-red-400 hover:underline">
                <x-heroicon-o-hand-thumb-down class="size-4 mr-1"/>
                dislike
            </button>
        @else
            <button wire:click="toggleLike"
                    class="flex items-center text-green-800 dark:text-green-300 hover:underline">
                <x-heroicon-o-hand-thumb-up class="size-4 mr-1"/>
                like
            </button>
        @endif
    @endauth
    <div>{{ $likeable->likes_count }} Likes</div>
</div>