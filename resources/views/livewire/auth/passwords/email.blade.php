@section('title', 'Reset password')

<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="/">
            <h1 class="text-6xl text-center text-green-600"><b>Cărți cu de toate </b><h1/>
        </a>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 shadow-xl bg-gray-50 sm:rounded-lg sm:px-10">
            <h2 class="mt-6 mb-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                Resetează parola
            </h2>
            @if ($emailSentMessage)
                <div class="p-4 rounded-md bg-green-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>

                        <div class="ml-3">
                            <p class="text-sm font-medium leading-5 text-green-800">
                                {{ $emailSentMessage }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="sendResetPasswordLink">
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
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:bg-green-700 focus:ring-indigo active:bg-indigo-700">
                                Trimite link de resetare a parolei
                            </button>
                        </span>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
