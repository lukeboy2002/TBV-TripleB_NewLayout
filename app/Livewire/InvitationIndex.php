<?php

namespace App\Livewire;

use App\Models\Invitation;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class InvitationIndex extends Component
{
    use WithPagination;

    public $delete_id;

    #[Url()]
    public $search = '';

    #[Url()]
    public $sortBy = 'invited_date';

    #[Url()]
    public $sortDir = 'DESC';

    public $confirmingDeletion = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function deleteInvitee(Invitation $invitee)
    {
        $invitee->delete();
        $this->confirmingDeletion = false;

        toastr()->success('Invitee has been deleted.');
    }

    public function delete($id): void
    {
        $this->confirmingDeletion = $id;
    }

    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';

            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        return view('livewire.invitation-index', [
            'invitees' => Invitation::latest()
                ->orderBy($this->sortBy, $this->sortDir)
                ->search($this->search)
                ->paginate(5),
        ]);
    }
}
