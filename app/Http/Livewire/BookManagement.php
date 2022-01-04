<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookManagement extends Component
{

    use WithPagination;

    public $entries = 10;
    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $fields = ['name', 'category_id'];
    public $user;

    public $name;
    public $author;
    public $category_id;
    public $description;
    public $pages;
    public $copies;

    protected $rules = [
        'name' => 'required|min:6',
        'author' => 'required',
        'pages' => 'required|numeric',
        'copies' => 'required|numeric',
        'description' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Numele este obligatoriu.',
        'name.min' => 'Numele poate fi de minim 6 caractere',
        'author.required' => 'Acest câmp este obligatoriu',
        'pages.required' => 'Acest câmp este obligatoriu',
        'copies.required' => 'Acest câmp este obligatoriu',
        'description.required' => 'Acest câmp este obligatoriu',
    ];

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

    public function deleteBook($id) {
        $currentBook = Book::find($id);
        $currentBook->delete();
    }

    public function addBook() {
        $this->validate();
        $this->dispatchBrowserEvent('close-modal');
        $newBook = Book::create([
            'name' => $this->name,
            'author' => $this->author,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'pages' => $this->pages,
            'copies' => $this->copies,
        ]);
        $newBook->save();
        $this->redirect(route('carte', ['book' => $newBook]));
    }

    public function render()
    {
        return view('livewire.book-management',[
            'books' => Book::orderBy($this->sortField, $this->sortDirection)->searchBooks($this->search)->paginate($this->entries)
        ]);
    }
}
