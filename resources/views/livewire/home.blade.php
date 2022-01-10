<div class="flex flex-col w-full h-full px-10 py-10 rounded-md card">
    <div id="filters" class="flex items-center justify-between w-1/2 mb-10">
        <span>Categorie:</span>
        <div class="flex items-center">
            <input wire:model='category' type="radio" class="text-green-500 border border-gray-600 form-radio" name="category" id="toate" value="0">
            <label for="toate" class="ml-1">Toate</label>
        </div>
        @foreach (App\Models\Category::all() as $category)
            <div class="flex items-center">
                <input wire:model='category' type="radio" class="text-green-500 border border-gray-600 form-radio" name="category" id="{{$category->name}}" value="{{$category->id}}">
                <label for="{{$category->name}}" class="ml-1">{{$category->name}}</label>
            </div>
        @endforeach
    </div>
    <div id="books" class="grid grid-cols-2 gap-20 xl:grid-cols-4">
        @forelse($books as $book)
            <div id="book-card" class="flex flex-col items-center justify-between h-30rem">
                <span class="mb-1 text-2xl text-center text-green-600">{{ mb_strimwidth($book->name, 0, 30, "...") }}</span>
                <span class="mb-4 text-lg text-center">{{ $book->author}} ● {{ $book->category()->first()->name }}</span>
                <img class="h-64" src="{{$book->coverUrl()}}" alt="">
                <span class="mb-4">Cărti disponibile: <b>{{$book->copies}}</b></span>
                @if($book->copies > 0)
                    <a href="/carte/{{$book->id}}" class="px-4 py-2 text-white bg-green-600 rounded">Vezi mai multe</a>
                @else
                    <button class="px-4 py-2 text-white bg-gray-600 rounded cursor-not-allowed">Stoc indisponibil</button>
                @endif
            </div>
        @empty
            Nu există rezultate.
        @endforelse
    </div>
    <div class="flex justify-end mt-6">
        {{ $books->links() }}
    </div>
</div>
