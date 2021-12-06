<div x-cloak>
    <div x-show="addModal"  class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center overflow-auto bg-gray-700 bg-opacity-70" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div x-show="addModal" @click.away="addModal = !addModal" class="w-1/2 px-10 py-8 mx-4 bg-white rounded shadow-lg h-max" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
            <h1 class="text-lg font-semibold">Editare carte</h1>
            <div class="flex items-center justify-between mt-10">
                <span class="w-1/3">Nume</span>
                <input wire:model='name' class="w-2/3 border border-green-500 rounded-md form-input" type="text">
            </div>
            @error('name') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
            <div class="flex items-center justify-between mt-10">
                <span class="w-1/3">Autor</span>
                <input wire:model='author' class="w-2/3 border border-green-500 rounded-md form-input" type="text">
            </div>
            @error('author') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
            <div class="flex items-center mt-10">
                <span class="w-1/3">Categorie</span>
                <select class="border border-green-500 rounded-md form-select" wire:model='category_id' name="category" id="category">
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between mt-10">
                <span class="w-1/3">Pagini</span>
                <input wire:model='pages' class="w-2/3 border border-green-500 rounded-md form-input" type="number">
            </div>
            @error('pages') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
            <div class="flex items-center justify-between mt-10">
                <span class="w-1/3">Cărți</span>
                <input wire:model='copies' class="w-2/3 border border-green-500 rounded-md form-input" type="number">
            </div>
            @error('copies') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
            <div class="flex justify-between mt-10">
                <span class="w-1/3">Descriere</span>
                <textarea wire:model='description' class="w-2/3 border border-green-500 rounded-md form-input" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            @error('description') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
            <div class="flex justify-end mt-4">
                <button @click="addModal = !addModal;" class="mr-6 text-lg font-semibold text-gray-300 poppins">Anulează</button>
                <button wire:click='addBook'  class="text-lg font-semibold text-green-700 poppins">Salvează</button>
            </div>
        </div>
    </div>
</div>
