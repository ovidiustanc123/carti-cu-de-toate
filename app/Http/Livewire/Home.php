<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;

    public $entries = 8;

    public function paginationView()
    {
        return 'components.pagination-view';
    }

    public function render()
    {
        return view('livewire.home', [
            'books' => Book::paginate($this->entries)
        ]);
    }
}
