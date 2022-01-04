<div class="fixed top-0 left-0 w-64 h-screen overflow-hidden bg-white shadow-lg rounded-r-3xl" id="sidenav">
    <div class="flex flex-col py-10">
        <a href="/" class="flex items-center justify-center">
            <i class="text-6xl las la-book-reader"></i>
            <span class="flex flex-col">
                <span class="text-xl">Cărți cu</span>
                <span class="text-xl">de toate</span>
            </span>
        </a>
        <div class="flex flex-col px-6 py-10 gap-y-2">
            <a href="/">
                <div class="flex items-center px-4 py-1 text-lg {{Route::currentRouteName() === 'home' ? 'bg-green-100 text-green-700' : ''}} rounded">
                    <i class="mr-2 las la-home"></i>
                    <span>Prima pagină</span>
                </div>
            </a>
            @if (auth()->user()->isAdmin())
                <a href="/management-studenti">
                    <div class="flex items-center px-4 py-1 text-lg {{Route::currentRouteName() === 'management-studenti' ? 'bg-green-100 text-green-700' : ''}} rounded">
                        <i class="mr-2 las la-user-friends"></i>
                        <span>Studenți</span>
                    </div>
                </a>
                <a href="/management-carti">
                    <div class="flex items-center px-4 py-1 text-lg {{Route::currentRouteName() === 'management-carti' ? 'bg-green-100 text-green-700' : ''}} rounded">
                        <i class="mr-2 las la-book"></i>
                        <span>Cărți</span>
                    </div>
                </a>
                <a href="/imprumuturi">
                    <div class="flex items-center px-4 py-1 text-lg {{Route::currentRouteName() === 'imprumuturi' ? 'bg-green-100 text-green-700' : ''}} rounded">
                        <i class="mr-2 las la-address-book"></i>
                        <span>Împrumuturi</span>
                    </div>
                </a>
            @else
                <a href="/cartile-mele">
                    <div class="flex items-center px-4 py-1 text-lg {{Route::currentRouteName() === 'cartile-mele' ? 'bg-green-100 text-green-700' : ''}} rounded">
                        <i class="mr-2 las la-address-book"></i>
                        <span>Cărțile mele</span>
                    </div>
                </a>
            @endif

        </div>
    </div>
</div>
