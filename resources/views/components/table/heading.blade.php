@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->except('wire:click')->merge(['class' => 'py-2.5 px-5 text-left rounded border-b-2']) }}>
    @unless ($sortable)
        <button class="text-sm font-bold text-green-600 poppins"><span>{{ $slot }}</span></button>
    @else
        <button {{ $attributes->except('class') }} class="flex items-center text-sm font-bold text-green-600 poppins">
            <span class="mr-2">{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 0L9.33013 4.28571H0.669873L5 0Z" fill="#605B57"/>
                    </svg>
                @elseif ($direction === 'desc')
                    <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 4.42871L0.669872 0.142997L9.33013 0.142997L5 4.42871Z" fill="#605B57"/>
                    </svg>
                @else
                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 11.4287L0.669872 7.143L9.33013 7.143L5 11.4287Z" fill="#605B57"/>
                        <path d="M5 0L9.33013 4.28571H0.669873L5 0Z" fill="#605B57"/>
                    </svg>
                @endif
            </span>
        </button>
    @endunless
</th>
