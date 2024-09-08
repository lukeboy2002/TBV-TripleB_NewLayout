<div class="pl-6 pr-4">
    <x-heading>Comments</x-heading>
    <livewire:comment-create :post="$post"/>

    @foreach($comments as $comment)
        <livewire:comment-item
                :comment="$comment"
                wire:key="comment-{{$comment->id}}"/>
    @endforeach

    <div class="pt-4">
        {{ $comments->onEachSide(1)->links() }}
    </div>
</div>