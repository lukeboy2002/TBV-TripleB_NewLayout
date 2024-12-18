<div>
    <div class="bg-light dark:bg-dark pt-1 border border-primary rounded-xl p-4 my-4">
        <header class="flex justify-between items-center mb-2 p-2">
            <div class="flex items-center">
                <div class="inline-flex items-center space-x-2 mr-3 font-semibold text-sm uppercase">
                    <img src="{{$comment->user->profile_photo_url}}"
                         alt=" {{ $comment->user->username }}"
                         class="rounded-full shadow-lg size-8"
                    />
                    <p class="text-primary font-bold"> {{ $comment->user->username }} </p>

                </div>
                <p class="text-xs text-dark dark:text-light">
                    {{ $comment->created_at->diffForHumans() }}
                </p>
            </div>
            <div class="text-xs text-dark dark:text-light flex items-center space-x-4">
                <livewire:like-component type="comment" id="{{ $comment->id }}"/>
            </div>
        </header>
        <main>
            @if($editing)
                <livewire:comment-create :comment-model="$comment"/>
            @else
                <div class="p-3 prose-sm prose-orange max-w-none leading-6">
                    {!! $comment->comment !!}
                </div>
            @endif
        </main>
        <footer class="flex justify-end items-center text-xs ml-4 space-x-1 empty:hidden">
            <div class="flex space-x-2">
                @can('update', $comment)
                    <div>
                        <button wire:click.prevent="CommentEdit"
                                class="flex items-center font-medium text-sm text-blue-800 dark:text-blue-300 hover:underline">
                            <x-heroicon-s-pencil-square class="size-3 mr-1.5"/>
                            edit
                        </button>
                    </div>
                @endcan
                @can('delete', $comment)
                    <div>
                        <button wire:click="delete( {{ $comment->id }})"
                                wire:loading.attr="disabled"
                                class="flex items-center font-medium text-sm text-red-800 dark:text-red-400 hover:underline">
                            <x-heroicon-s-trash class="size-3 mr-1.5"/>
                            delete
                        </button>
                    </div>
                @endcan
            </div>
        </footer>
    </div>

    <x-modal.dialog wire:model.live="confirmingDeletion">
        <x-slot name="title">
            Delete Post
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this post?
        </x-slot>

        <x-slot name="footer">
            <x-button.secondary class="px-3 py-2 text-xs font-medium"
                                wire:click="$set('confirmingDeletion', false)"
                                wire:loading.attr="disabled">
                Cancel
            </x-button.secondary>

            <x-button.danger class="px-3 py-2 text-xs font-medium"
                             wire:click="deleteComment( {{ $confirmingDeletion }} )"
                             wire:loading.attr="disabled">
                Delete Comment
            </x-button.danger>
        </x-slot>
    </x-modal.dialog>
</div>