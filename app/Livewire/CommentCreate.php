<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CommentCreate extends Component
{
    use InteractsWithBanner;

    public string $comment = '';

    public Post $post;

    public ?Comment $commentModel = null;

    public function mount(
        Post $post,
        $commentModel = null,
    ) {
        $this->post = $post;
        $this->commentModel = $commentModel;
        $this->comment = $commentModel ? $commentModel->comment : '';

    }

    public function createComment()
    {
        $user = auth()->user();
        if (! $user) {
            return $this->redirect('/login');
        }

        if ($this->commentModel) {
            if ($this->commentModel->user_id != $user->id) {
                return response('You are not allowed to perform this action',
                    403);
            }

            $this->commentModel->comment = $this->comment;
            $this->commentModel->save();

            $this->comment = '';
            $this->dispatch('commentUpdated');
        } else {
            $comment = Comment::create([
                'comment' => $this->comment,
                'post_id' => $this->post->id,
                'user_id' => $user->id,
            ]);

            $this->dispatch('commentCreated', $comment->id);
            $this->comment = '';
            $this->banner('Successfully saved!');
        }
    }

    public function render()
    {
        return view('livewire.comment-create');
    }
}
