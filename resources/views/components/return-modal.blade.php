<div x-cloak>
    <div x-show="returnModal"  class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center overflow-auto bg-gray-700 bg-opacity-70" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div x-show="returnModal" @click.away="returnModal = !returnModal" class="w-2/5 px-10 py-8 mx-4 bg-white rounded shadow-lg h-max" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
            <h1 class="mb-10 text-2xl font-semibold">Returnează {{App\Models\Book::where('id', App\Models\BorrowRequest::where('id', $id)->first()->book_id)->first()->name }}</h1>
            <div class="text-center">
                <h1 class="text-lg font-semibold text-left">Mergi la BookBox și predă cartea în sertarul cu numărul de mai jos.</h1>
                <span class="text-7xl">{{$this->randomNumber}}</span>
            </div>
            <div class="flex justify-end mt-8">
                <button @click="returnModal = false" class="px-4 py-2 text-white bg-gray-600 rounded">Anulează</button>
                <button wire:click='returnBook({{$id}})' class="px-4 py-2 ml-2 text-white bg-green-600 rounded">Confirmă</button>
            </div>
        </div>
    </div>
</div>
