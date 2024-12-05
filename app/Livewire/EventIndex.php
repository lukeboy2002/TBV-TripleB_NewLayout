<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class EventIndex extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $tag = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[Computed]
    public function events()
    {
        return Event::Upcoming()
            ->with('tags')
            ->search($this->search)
            ->orderBy('start_date', 'asc')
            ->when($this->activeTag, function ($query) {
                $query->withAnyTags([$this->tag]);
            })
            ->paginate(4);
    }

    #[Computed]
    public function activeTag()
    {
        if ($this->tag === null || $this->tag === '') {
            return null;
        }

        return Tag::findFromString($this->tag);
    }

    public function render()
    {
        return view('livewire.event-index');
    }
}
