<div class="w-full px-10 py-8 card">
    <input wire:model="search" type="text" class="w-full px-4 mb-8 rounded-md form-input bg-green-light" placeholder="Căutare" id="search1" name="search1">
    <x-table>
        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">Nume
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('email')" :direction="$sortField === 'email' ? $sortDirection : null">Email
            </x-table.heading>
            <x-table.heading class="flex justify-end mr-20">Acțiuni</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($users as $user)
            <x-table.row>
                <x-table.cell>
                    <p class="text-green-900 ">{{ $user->name }}</p>
                </x-table.cell>
                <x-table.cell><p class="text-green-900 ">{{ $user->email }}</p></x-table.cell>
                <x-table.cell class="flex justify-end">
                    <div class="flex justify-between gap-x-2">
                        <a href="/editare-utilizator/{{$user->id}}" class="px-4 py-2 text-white bg-green-600 rounded">Editează</a>
                        <div x-data="{deleteModal: false}">
                            <button @click="deleteModal = !deleteModal" class="px-4 py-2 text-white bg-red-500 rounded">Elimină</button>
                            <x-confirm-modal :id="$user->id" :function="'deleteUser'" :title="'Ștergere utilizator'" :xshow="'deleteModal'">Sunteți sigur că vreți să eliminați acest utilizator?</x-confirm-modal>
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
            {{ $users->links() }}
        </div>
    </div>
</div>
