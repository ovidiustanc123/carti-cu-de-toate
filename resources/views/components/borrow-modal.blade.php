<div x-cloak>
    <div x-show="borrowModal"  class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center overflow-auto bg-gray-700 bg-opacity-70" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div x-show="borrowModal" @click.away="borrowModal = !borrowModal" class="w-2/5 px-10 py-8 mx-4 bg-white rounded shadow-lg h-max" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
            <h1 class="mb-10 text-2xl font-semibold">Împrumută {{$this->book->name}}</h1>
            <div>
                <h1 class="text-lg font-semibold">Pasul 1: Alege perioada pe care vrei să împrumuți cartea.</h1>
                <div class="flex items-center justify-between w-full px-2 py-4 rounded bg-blue-sky" x-data="{ interval: @entangle('interval') }">
                    <button @click="interval = 7" class="py-2.5 text-sm font-semibold rounded-l px-9" x-bind:class="interval == 7 ? 'bg-green-600 text-white rounded' : ' text-green-600'">7 ZILE</button>
                    <button @click="interval = 14" class="py-2.5 text-sm font-semibold px-9" x-bind:class="interval == 14 ? 'bg-green-600 text-white rounded' : ' text-green-600'">14 ZILE</button>
                    <button @click="interval = 30" class="py-2.5 text-sm font-semibold px-9" x-bind:class="interval == 30 ? 'bg-green-600 text-white rounded' : ' text-green-600'">30 ZILE</button>
                    <button @click="interval = 60" class="py-2.5 text-sm font-semibold px-9" x-bind:class="interval == 60 ? 'bg-green-600 text-white rounded' : ' text-green-600'">60 ZILE</button>
                    <button @click="interval = 90" class="py-2.5 text-sm font-semibold rounded-r px-9" x-bind:class="interval == 90 ? 'bg-green-600 text-white rounded' : ' text-green-600'">90 ZILE</button>
                </div>
            </div>
            @if($this->interval)
            <div class="text-center">
                <h1 class="text-lg font-semibold text-left">Pasul 2: Mergi la BookBox și preia cartea din sertarul cu numărul de mai jos.</h1>
                <span class="text-7xl">{{$this->randomNumber}}</span>
            </div>
            @endif
            <div class="flex justify-end mt-8">
                <button @click="borrowModal = false" class="px-4 py-2 text-white bg-gray-600 rounded">Anulează</button>
                @if ($this->interval)
                    <button wire:click='borrowBook' class="px-4 py-2 ml-2 text-white bg-green-600 rounded">Confirmă</button>
                @endif
            </div>
        </div>
    </div>
</div>
