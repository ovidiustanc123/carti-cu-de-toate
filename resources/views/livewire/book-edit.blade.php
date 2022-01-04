<div class="flex px-16 py-16 card">
    <div class="w-1/3">
        @if ($upload)
            <img class="w-full" src="{{$upload->temporaryUrl()}}" alt="">
        @else
            <img class="w-full" src="{{$this->book->coverUrl()}}" alt="">
        @endif
        @if(auth()->user()->isAdmin())
            <label for="file-upload" class="px-4 py-2 mt-4 text-white bg-gray-600 rounded custom-file-upload">
                <input wire:model='upload' class="hidden" id="file-upload" type="file"/>
                <i class="las la-cloud-upload-alt"></i> Editează coperta
            </label>
            @if ($upload)
                <button wire:click='editCover' class="px-4 py-2 text-white bg-green-600 rounded">Salvează poza</button>
            @endif
        @endif
    </div>
    <div class="flex flex-col w-2/3 ml-20">
        <span class="mb-1 text-2xl text-green-600">{{$this->book->name}}</span>
        <span class="mb-4 text-lg">{{$this->book->author}} ● {{$this->book->category()->first()->name}}</span>
        <span class="mb-4 text-gray-700">{{$this->book->description}} </span>
        <span>Număr de pagini: <b>{{$this->book->pages}}</b></span>
        <span>Cărți disponibile: <b>{{$this->book->copies}}</b></span>
        @if(auth()->user()->isAdmin())
            <div x-data="{editModal: false}" x-on:close-modal.window="editModal = false">
                <div x-data="{deleteModal: false}" class="flex justify-end gap-x-2">
                    <button @click="editModal = !editModal" class="px-4 py-2 text-white bg-green-600 rounded">Editează</button>
                    <button @click="deleteModal = !deleteModal" class="px-4 py-2 text-white bg-red-500 rounded">Elimină</button>
                    <x-edit-modal :book="$this->book"></x-edit-modal>
                    <x-confirm-modal :id="''" :function="'deleteBook'" :title="'Ștergere carte'" :xshow="'deleteModal'">Sunteți sigur că vreți să eliminați această carte?</x-confirm-modal>
                </div>
            </div>
            <div class="flex justify-end">
                <x-alerts.success :saved="$savedBook" :message="$message" ></x-alerts.success>
            </div>
        @else
            <div x-data="{borrowModal: false}" x-on:close-modal.window="borrowModal = false" class="flex justify-end gap-x-2">
                <button @click="borrowModal = !borrowModal" class="px-4 py-2 text-white bg-green-600 rounded">Împrumută</button>
                <x-borrow-modal></x-borrow-modal>
            </div>
            <div class="flex items-center justify-end">
                <x-alerts.success :saved="$requestSent" :message="$message2" ></x-alerts.success>
            </div>
        @endif
    </div>
</div>
