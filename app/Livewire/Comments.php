<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use withPagination;

    public Post $post;

    protected $listeners
        = [
            'commentCreated' => '$refresh',
            'commentDeleted' => '$refresh',
        ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        $comments = $this->selectComments();

        return view('livewire.comments', compact('comments'));
    }

    private function selectComments()
    {
        return Comment::where('post_id', '=', $this->post->id)
            ->with(['post', 'user'])
            ->orderByDesc('created_at')
            ->paginate(5);
    }
}
