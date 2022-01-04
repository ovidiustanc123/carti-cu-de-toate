<?php

namespace App\Http\Livewire;

use App\Models\BorrowRequest;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowRequestManagement extends Component
{

    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'asc';
    public $fields = ['created_at', 'email'];

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

    public function deleteRequest($id) {
        $currentRequest = BorrowRequest::find($id);
        $currentRequest->delete();
    }

    public function render()
    {
        return view('livewire.borrow-request-management', [
            'borrow_requests' => BorrowRequest::orderBy($this->sortField, $this->sortDirection)->paginate($this->entries)
        ]);
    }
}
