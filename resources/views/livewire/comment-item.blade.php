<div>
    <div class="bg-gray-50 pt-1 border border-gray-200 rounded-xl p-4 my-4">
        <header class="flex justify-between items-center mb-2 p-2">
            <div class="flex items-center">
                <div class="inline-flex items-center space-x-2 mr-3 font-semibold text-sm text-gray-900 uppercase">
                    <img src="{{$comment->user->profile_photo_url}}"
                         alt=" {{ $comment->user->username }}"
                         class="rounded-full shadow-lg size-8"
                    />
                    <p class="text-orange-500 font-bold"> {{ $comment->user->username }} </p>

                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400 flex items-center space-x-4">
                @auth
                    <div class="flex">
                        <button type="submit"
                                class="text-green-500 hover:bg-green-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2">
                            <x-heroicon-s-hand-thumb-up class="size-4"/>
                            <span class="sr-only">Like</span>
                        </button>
                        <button type="submit"
                                class="text-red-500 hover:bg-red-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center me-2">
                            <x-heroicon-s-hand-thumb-down class="size-4"/>
                            <span class="sr-only">Dislike</span>
                        </button>
                    </div>
                @endauth
                <div class="flex items-center space-x-1">
                    <x-heroicon-o-heart class="size-3"/>
                    <div class="bg-red-500 text-white">2</div>
                </div>
            </div>
        </header>
        <main>
            @if($editing)
                <livewire:comment-create :comment-model="$comment"/>
            @else
                <div class="p-3 prose prose-sm max-w-none leading-6">
                    {!! $comment->comment !!}
                </div>
            @endif
        </main>
        <footer class="flex justify-end items-center text-xs ml-4 space-x-1 empty:hidden">
            <div class="flex space-x-2">
                @can('update', $comment)
                    <div>
                        <button wire:click.prevent="CommentEdit"
                                class="flex items-center font-medium text-sm text-blue-500 hover:underline">
                            <x-heroicon-s-pencil-square class="size-3 mr-1.5"/>
                            edit
                        </button>
                    </div>
                @endcan
                @can('delete', $comment)
                    <div>
                        <button wire:click="delete( {{ $comment->id }})"
                                wire:loading.attr="disabled"
                                class="flex items-center font-medium text-sm text-red-500 hover:underline dark:text-gray-400">
                            <x-heroicon-s-trash class="size-3 mr-1.5"/>
                            delete
                        </button>
                    </div>
                @endcan
            </div>
        </footer>
    </div>

    <x-modal-dialog wire:model.live="confirmingDeletion">
        <x-slot name="title">
            Delete Post
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this post?
        </x-slot>

        <x-slot name="footer">
            <x-button-secondary class="px-3 py-2 text-xs font-medium"
                                wire:click="$set('confirmingDeletion', false)"
                                wire:loading.attr="disabled">
                Cancel
            </x-button-secondary>

            <x-button-danger class="px-3 py-2 text-xs font-medium"
                             wire:click="deleteComment( {{ $confirmingDeletion }} )"
                             wire:loading.attr="disabled">
                Delete Comment
            </x-button-danger>
        </x-slot>
    </x-modal-dialog>
</div>