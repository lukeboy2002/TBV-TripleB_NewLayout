<?php

namespace App\Livewire\Frontend;

use App\Models\Comment;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CommentItem extends Component
{
    use InteractsWithBanner;

    public Comment $comment;

    public bool $editing = false;

    public bool $replying = false;

    protected $listeners = [
        'cancelEditing' => 'cancelEditing',
        'commentUpdated' => 'commentUpdated',
        'commentCreated' => 'commentCreated',
    ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment->load('user', 'comments');
    }

    public function deleteComment()
    {
        $this->authorize('delete', $this->comment);

        $id = $this->comment->id;

        $this->comment->delete();
        $this->dispatch('commentDeleted', $id);

        $this->banner('Successfully removed!');
    }

    public function CommentEdit()
    {
        $this->editing = true;
    }

    public function cancelEditing()
    {
        $this->editing = false;
        $this->replying = false;
    }

    public function commentUpdated()
    {
        $this->editing = false;
    }

    public function startReply()
    {
        $this->replying = true;
    }

    public function commentCreated()
    {
        $this->replying = false;
    }

    public function render()
    {
        return view('livewire.frontend.comment-item');
    }
}
