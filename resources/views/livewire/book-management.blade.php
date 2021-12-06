<div class="w-full px-10 py-8 card">
    <div x-data="{addModal: false}" x-on:close-modal.window="addModal = false" class="flex justify-end">
        <button @click="addModal = !addModal" class="px-4 py-2 mb-2 text-white bg-green-600 rounded">Adaugă o carte</button>
        <x-add-modal></x-add-modal>
    </div>
    <input wire:model="search" type="text" class="w-full px-4 mb-8 rounded-md form-input bg-green-light" placeholder="Căutare" id="search1" name="search1">
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">Nume
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('category_id')" :direction="$sortField === 'category_id' ? $sortDirection : null">Categorie
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('author')" :direction="$sortField === 'author' ? $sortDirection : null">Autor
            </x-table.heading>
            <x-table.heading class="flex justify-end mr-20">Acțiuni</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($books as $book)
            <x-table.row>
                <x-table.cell>
                    <p class="text-green-900 ">{{ mb_strimwidth($book->name, 0, 50, "...") }}</p>
                </x-table.cell>
                <x-table.cell><p class="text-green-900 ">{{ $book->category()->first()->name }}</p></x-table.cell>
                <x-table.cell><p class="text-green-900 ">{{ $book->author}}</p></x-table.cell>
                <x-table.cell class="flex justify-end">
                    <div class="flex justify-between gap-x-2">
                        <a href="/carte/{{$book->id}}" class="px-4 py-2 text-white bg-green-600 rounded">Editează</a>
                        <div x-data="{deleteModal: false}">
                            <button @click="deleteModal = !deleteModal" class="px-4 py-2 text-white bg-red-500 rounded">Elimină</button>
                            <x-confirm-modal :id="$book->id" :function="'deleteBook'" :title="'Ștergere carte'" :xshow="'deleteModal'">Sunteți sigur că vreți să eliminați această carte?</x-confirm-modal>
                        </div>
                    </div>
                </x-table.cell>
            </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="3">
                        <div class="flex justify-center">
                            <p class="text-lg text-gray-600 poppins">Nu au fost găsite rezultate</p>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot>
    </x-table>
    <div class="flex items-center justify-end mx-10 mt-6">
        <div class="flex items-center">
            <p class="text-gray-500 "> Rows per page: </p>
            <select wire:model="entries" class="text-gray-500 form-select ">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div>
            {{ $books->links() }}
        </div>
    </div>
</div>
