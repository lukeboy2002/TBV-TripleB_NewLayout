<?php

namespace App\Livewire;

use App\Models\Comment;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CommentItem extends Component
{
    use InteractsWithBanner;

    public Comment $comment;

    public bool $editing = false;

    public bool $replying = false;

    public $delete_id;

    public $confirmingDeletion = false;

    protected $listeners
        = [
            'cancelEditing' => 'cancelEditing',
            'commentUpdated' => 'commentUpdated',
            'commentCreated' => 'commentCreated',
        ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment->load('user');
    }

    public function deleteComment(Comment $comment): void
    {
        $this->authorize('delete', $this->comment);

        $id = $this->comment->id;
        $this->comment->delete();

        $this->confirmingDeletion = false;

        $this->dispatch('commentDeleted', $id);
        $this->banner('Successfully removed!');
    }

    public function delete($id): void
    {
        $this->confirmingDeletion = $id;
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
        return view('livewire.comment-item');
    }
}
