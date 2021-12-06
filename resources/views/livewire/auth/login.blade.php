@section('title', 'Sign in to your account')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="/">
            <h1 class="text-6xl text-center text-green-600 "><b>Cărți cu de toate </b><h1/>
        </a>
    </div>

    <div class="mt-16 sm:mx-auto sm:w-full sm:max-w-md ">
        <div class="px-4 py-8 shadow-xl bg-gray-50 sm:rounded-lg sm:px-10">
            <div class="mb-6">
                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                    Intră în cont
                </h2>
                @if (Route::has('register'))
                    <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                        Sau
                        <a href="{{ route('register') }}" class="font-medium text-green-600 transition duration-150 ease-in-out hover:text-green-500 focus:outline-none focus:underline">
                            Crează un cont nou
                        </a>
                    </p>
                @endif
            </div>
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                        Adresă de email
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        Parolă
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="w-4 h-4 text-green-600 transition duration-150 ease-in-out form-checkbox" />
                        <label for="remember" class="block ml-2 text-sm leading-5 text-gray-900">
                            Ține-mă minte
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-green-600 transition duration-150 ease-in-out hover:text-green-500 focus:outline-none focus:underline">
                            Ai uitat parola?
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:ring-indigo active:bg-indigo-700">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
