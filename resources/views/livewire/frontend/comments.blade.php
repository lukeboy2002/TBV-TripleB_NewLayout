<div>
    <h3 class="text-xl font-heading font-bold">Comments </h3>
    <div class="py-4">
        <livewire:frontend.comment-create :post="$post"/>
    </div>

    @foreach($comments as $comment)
        <livewire:frontend.comment-item
                :comment="$comment"
                wire:key="comment-{{$comment->id}}-{{$comment->comments->count()}}"/>
    @endforeach

    <div class="pt-4">
        {{ $comments->onEachSide(1)->links() }}
    </div>
</div>