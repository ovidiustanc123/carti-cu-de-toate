<div class="flex flex-col w-full h-full px-10 py-10 rounded-md card">
    <div id="filters" class="mb-20">
filters tbd
    </div>
    <div id="books" class="grid grid-cols-4 gap-20">
        @forelse($books as $book)
            <div id="book-card" class="flex flex-col items-center">
                <span class="mb-1 text-2xl text-center text-green-600">{{ mb_strimwidth($book->name, 0, 30, "...") }}</span>
                <span class="mb-4 text-lg text-center">{{ $book->author}} ● {{ $book->category()->first()->name }}</span>
                <img class="h-64" src="{{$book->picture}}" alt="">
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
