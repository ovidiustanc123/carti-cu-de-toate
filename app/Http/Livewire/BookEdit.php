<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\BorrowRequest;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookEdit extends Component
{
    use WithFileUploads;

    public $book;
    public $name;
    public $author;
    public $category_id;
    public $description;
    public $pages;
    public $copies;
    public $upload;

    public $interval;

    public $randomNumber;

    public $savedBook = 'savedBook';
    public $message = 'Detaliile cărții au fost salvate cu succes.';

    public $requestSent = 'requestSent';
    public $message2 = 'Cartea a fost împrumutată cu succes și te așteaptă la BookBox';

    protected $rules = [
        'name' => 'required|min:6',
        'author' => 'required',
        'pages' => 'required|numeric',
        'copies' => 'required|numeric',
        'description' => 'required',
        'upload' => 'nullable|image|max:2000'
    ];

    protected $messages = [
        'name.required' => 'Numele este obligatoriu.',
        'name.min' => 'Numele poate fi de minim 6 caractere',
        'author.required' => 'Acest câmp este obligatoriu',
        'pages.required' => 'Acest câmp este obligatoriu',
        'copies.required' => 'Acest câmp este obligatoriu',
        'description.required' => 'Acest câmp este obligatoriu',
    ];

    public function mount(Book $book) {
        $this->book = $book;
        $this->name = $this->book->name;
        $this->author = $this->book->author;
        $this->category_id = $this->book->category_id;
        $this->description = $this->book->description;
        $this->pages = $this->book->pages;
        $this->copies = $this->book->copies;
        $this->randomNumber = rand(100, 999);
    }

    public function deleteBook() {
        $this->book->delete();
        $this->redirect(route('management-carti'));
    }

    public function editCover() {
        $this->book->update([
            'picture' => $this->upload->store('/', 'covers'),
        ]);
        $this->book->save();
        $this->emit('savedBook');
        $this->upload=null;
    }

    public function saveBook() {
        $this->validate();
        $this->dispatchBrowserEvent('close-modal');
        $this->book->update([
            'name' => $this->name,
            'author' => $this->author,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'pages' => $this->pages,
            'copies' => $this->copies
        ]);
        $this->upload && $this->book->update([
            'picture' => $this->upload->store('/', 'covers'),
        ]);
        $this->book->save();
        $this->emit('savedBook');
    }

    public function borrowBook() {
        $this->dispatchBrowserEvent('close-modal');
        $newRequest = BorrowRequest::create([
            'user_id' => auth()->user()->id,
            'book_id' => $this->book->id,
            'status' => 'Pending',
            'days' => $this->interval,
        ]);
        $newRequest->save();
        $this->book->update([
            'copies' => $this->book->copies -1,
        ]);
        $this->emit('requestSent');
    }

    public function render()
    {
        return view('livewire.book-edit');
    }
}
