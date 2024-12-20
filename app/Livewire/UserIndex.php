<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $delete_id;

    public $confirmingDeletion = false;

    #[Url()]
    public $search = '';

    #[Url()]
    public $sortBy = 'created_at';

    #[Url()]
    public $sortDir = 'DESC';

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
        return view('livewire.user-index', [
            'users' => User::search($this->search)
                ->leftJoin('model_has_roles as role', 'id', '=', 'role.model_id')
                ->leftJoin('roles', 'role.role_id', '=', 'roles.id') // Join the roles table
                ->select('users.*', 'roles.name as role_name') // Select the role name
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate(10),
        ]);
    }
}
