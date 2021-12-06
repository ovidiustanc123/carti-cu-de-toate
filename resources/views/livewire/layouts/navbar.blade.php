<nav class="flex items-center justify-end px-4 py-8 ml-64">
  @auth
    <div x-data="{show: false}" class="pr-4">
        <span @click="show = !show" class="text-4xl cursor-pointer">
            <i class="las la-user-circle"></i>
        </span>
        <div x-cloak x-show="show" @click.away="show = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 origin-top-left right-6 w-28">
            <div class="flex flex-col bg-white rounded-md shadow-lg justify-evenly">
                <a href="{{ route('profile') }}" class="px-4 py-2 text-base rounded opensans text-black-light hover:bg-green-100">Profil</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-4 py-2 text-base rounded opensans text-black-light hover:bg-green-100">Log out</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </div>

    </div>
  @endauth
  @guest
  <div class="flex items-center pr-4">
    <a class="px-6 py-3 mr-4 text-white bg-green-600 rounded-lg shadow-xl" href="/login">Login</a>
    <a class="px-6 py-3 text-white bg-green-600 rounded-lg shadow-xl" href="/register">Register</a>
  </div>
  @endguest
</nav>
