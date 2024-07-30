@php use App\Models\Comment; @endphp
<div>
    <article class="mt-4 ml-6 p-4 bg-gray-50 rounded-lg">
        <header class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900">
                    <img class="mr-2 w-6 h-6 rounded-full"
                         src="{{$comment->user->profile_photo_url}}"
                         alt="{{ $comment->user->username }}">{{ $comment->user->username }}
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <time pubdate datetime="2022-02-08"
                          title="February 8th, 2022">
                        {{ $comment->getFormattedDate() }}
                    </time>
                </p>
            </div>
        </header>
        <main>
            @if($editing)
                <livewire:frontend.comment-create :comment-model="$comment"/>
            @else
                <div class="text-gray-500 dark:text-gray-400">
                    {{$comment->comment}}
                </div>
            @endif
        </main>
        <footer class="flex justify-between items-center my-4 space-x-4">
            <div class="flex space-x-4">
                @auth
                    <button wire:click.prevent="startReply"
                            class="flex items-center font-medium text-sm text-gray-500 hover:text-gray-700 hover:underline">
                        <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor"
                             viewBox="0 0 20 18">
                            <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                        </svg>
                        Reply
                    </button>
                @endauth
                <button type="button"
                        class="flex items-center font-medium text-sm text-gray-500 hover:text-gray-700 hover:underline">
                    <x-heroicon-o-heart class="size-3 mr-1.5"/>
                    Likes
                </button>
            </div>
            <div class="flex space-x-4 empty:hidden">
                @can('update', $comment)
                    <div>
                        <button wire:click.prevent="CommentEdit"
                                class="flex items-center font-medium text-sm text-orange-500 hover:underline">
                            <x-heroicon-s-pencil-square class="size-3 mr-1.5"/>
                            edit
                        </button>
                    </div>
                @endcan
                @can('delete', $comment)
                    <div>
                        <button wire:click.prevent="deleteComment"
                                class="flex items-center font-medium text-sm text-red-500 hover:underline dark:text-gray-400">
                            <x-heroicon-s-trash class="size-3 mr-1.5"/>
                            delete
                        </button>
                    </div>
                @endcan
            </div>
        </footer>
        @if ($replying)
            <livewire:frontend.comment-create :post="$comment->post" :parent-comment="$comment"/>
        @endif
    </article>
    <div>
        @if ($comment->comments->count())
            <div class="ml-4">
                @foreach($comment->comments as $childComment)
                    <livewire:frontend.comment-item :comment="$childComment"
                                                    wire:key="comment-{{$childComment->id}}"/>
                @endforeach
            </div>
        @endif
    </div>
</div>