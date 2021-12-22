<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{

    use WithPagination;

    public $entries = 8;
    public $category = 0;

    public function paginationView()
    {
        return 'components.pagination-view';
    }

    public function render()
    {
        $books = Book::query()
                ->when($this->category == 0, function ($query) {
                    return $query;
                })
                ->when($this->category == 1, function ($query) {
                    return $query->where('category_id', 1);
                })
                ->when($this->category == 2, function ($query) {
                    return $query->where('category_id', 2);
                })
                ->when($this->category == 3, function ($query) {
                    return $query->where('category_id', 3);
                })
                ->when($this->category == 4, function ($query) {
                    return $query->where('category_id', 4);
                })
                ->paginate($this->entries);

        return view('livewire.home', [
            'books' => $books
        ]);
    }
}
