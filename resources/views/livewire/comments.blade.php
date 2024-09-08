<div class="pl-6 pr-4">
    <h3 class="text-xl font-black text-orange-500 tracking-widest border-l-4 border-orange-500 pl-2 mb-4">
        Comments
    </h3>

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