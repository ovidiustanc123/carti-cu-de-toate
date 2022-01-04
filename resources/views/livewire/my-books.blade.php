<div class="w-full px-10 py-8 card">
    <input wire:model="search" type="text" class="w-full px-4 mb-8 rounded-md form-input bg-green-light" placeholder="Căutare" id="search1" name="search1">
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('book_id')" :direction="$sortField === 'book_id' ? $sortDirection : null">Carte
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('days')" :direction="$sortField === 'days' ? $sortDirection : null">Zile
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null">Termen limită
            </x-table.heading>
            <x-table.heading>Acțiuni
            </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($borrow_requests as $borrow_request)
            <x-table.row>
                <x-table.cell><a href="/carte/{{App\Models\Book::where('id',$borrow_request->book_id)->first()->id}}" class="text-green-900 ">{{ App\Models\Book::where('id',$borrow_request->book_id)->first()->name }}</a></x-table.cell>
                <x-table.cell><p class="text-green-900 ">{{ $borrow_request->status }}</p></x-table.cell>
                <x-table.cell><p class="text-green-900 ">{{ $borrow_request->days }}</p></x-table.cell>
                <x-table.cell>
                    <p class="text-green-900 ">{{ date_format($borrow_request->created_at->addDays($borrow_request->days), 'd M Y') }}</p>
                </x-table.cell>
                <x-table.cell>
                    <div x-data="{returnModal: false}">
                        <button @click="returnModal = !returnModal" class="px-4 py-2 text-white bg-red-500 rounded">Returnează</button>
                        <x-return-modal :id="$borrow_request->id" :function="'returnBook'" :title="'Returnează carte'" :xshow="'returnModal'">Sunteți sigur că vreți să returnați această carte?</x-return-modal>
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
            {{ $borrow_requests->links() }}
        </div>
    </div>
</div>
