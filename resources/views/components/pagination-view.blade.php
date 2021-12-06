<div>
    @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center">
        <span>
            <p class="mx-10 text-gray-500 lato">{{$paginator->currentPage()}} of {{$paginator->lastPage()}}</p>
        </span>
        <span>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

            @else
                <button wire:click="previousPage" class="h-10 mr-14">
                    <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.74998 14.4166L1.33331 7.99998L7.74998 1.58331" stroke="#1B2327" stroke-opacity="0.54" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            @endif
        </span>
        <span>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" class="h-10 " name="nextPage">
                    <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.25 1.58331L7.66667 7.99998L1.25 14.4166" stroke="#1B2327" stroke-opacity="0.54" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            @else
            @endif
        </span>
    </nav>
    @endif
</div>
