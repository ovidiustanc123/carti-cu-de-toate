<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $fields = ['name', 'email'];
    public $user;

    protected $queryString = ['sortField', 'sortDirection', 'search' => ['except' => '']];

    public function paginationView()
    {
        return 'components.pagination-view';
    }

    public function mount() {
        if(auth()->user()->isUser()) {
            return redirect('/');
        }
    }

    public function sortBy($field)
    {
        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else{
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function deleteUser($id) {
        $currentUser = User::find($id);
        $currentUser->delete();
    }

    public function render()
    {
        return view('livewire.user-management', [
            'users' => User::where('role_id', 2)->orderBy($this->sortField, $this->sortDirection)->search($this->search)->paginate($this->entries)
        ]);
    }
}
