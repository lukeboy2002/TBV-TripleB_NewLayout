<div class="flex items-center space-x-4">
    @auth
        @if($isLiked)
            <button wire:click="toggleLike" class="flex items-center text-red-500 hover:underline">
                <x-heroicon-o-hand-thumb-down class="size-3 mr-1"/>
                dislike
            </button>
        @else
            <button wire:click="toggleLike" class="flex items-center text-green-500 hover:underline">
                <x-heroicon-o-hand-thumb-up class="size-3 mr-1"/>
                like
            </button>
        @endif
    @endauth
    <div>{{ $likeable->likes_count }} Likes</div>
</div>