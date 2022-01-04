<?php

namespace App\Http\Livewire;

use App\Models\BorrowRequest;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class MyBooks extends Component
{

    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'asc';
    public $fields = ['created_at', 'email'];
    public User $user;
    public $randomNumber;

    protected $queryString = ['sortField', 'sortDirection', 'search' => ['except' => '']];

    public function paginationView()
    {
        return 'components.pagination-view';
    }

    public function mount() {
        $this->user = auth()->user();
        $this->randomNumber = rand(100, 999);
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

    public function returnBook($id) {
        $currentBook = BorrowRequest::find($id);
        $currentBook->delete();
    }


    public function render()
    {
        return view('livewire.my-books', [
            'borrow_requests' => BorrowRequest::where('user_id', $this->user->id)->orderBy($this->sortField, $this->sortDirection)->paginate($this->entries)
        ]);
    }
}
