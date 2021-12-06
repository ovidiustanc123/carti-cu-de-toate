<div class="relative">
    <div class="absolute flex -mt-28">
        <img class="w-40 mt-12 ml-12 border-8 border-white rounded-full" src="/img/avatar_placeholder.png" alt="Avatar">
        <div class="mt-32 ml-10">
            <p class="text-2xl font-bold text-green-600">{{ $this->user->name }}</p>
            <p class="text-sm text-gray-700">{{$this->user->role()->first()->name}}</p>
        </div>
    </div>
    <div class="flex px-16 pb-20 pt-36 card">
        <div wire:key='form1' class="w-1/2 pr-20 ">
            <p class="text-2xl font-light lato-light text-green-dark mb-9">Editare Profil</p>
            <form wire:submit.prevent="editProfile" action="#" method="POST" class="">
                <div class="mt-10 mb-8">
                    <div class="flex items-center">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5C12 6.06087 11.5786 7.07828 10.8284 7.82843C10.0783 8.57857 9.06087 9 8 9C6.93913 9 5.92172 8.57857 5.17157 7.82843C4.42143 7.07828 4 6.06087 4 5C4 3.93913 4.42143 2.92172 5.17157 2.17157C5.92172 1.42143 6.93913 1 8 1C9.06087 1 10.0783 1.42143 10.8284 2.17157C11.5786 2.92172 12 3.93913 12 5V5Z" stroke="#14A16F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 12C6.14348 12 4.36301 12.7375 3.05025 14.0503C1.7375 15.363 1 17.1435 1 19H15C15 17.1435 14.2625 15.363 12.9497 14.0503C11.637 12.7375 9.85652 12 8 12V12Z" stroke="#14A16F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="ml-4 text-base font-bold lato text-green-dark">Nume</p>
                    </div>
                    <input wire:model='name' class="bg-green-100 p-2.5 pl-4 mt-2.5 lato w-full text-green-dark" type="text" placeholder="Introdu numele" name="name" style="border-radius: 5px">
                    @error('name') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
                </div>
                <div class="mt-10">
                    <div class="flex items-center">
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 4L8.89 9.26C9.21866 9.47928 9.6049 9.5963 10 9.5963C10.3951 9.5963 10.7813 9.47928 11.11 9.26L19 4H1ZM3 15H17C17.5304 15 18.0391 14.7893 18.4142 14.4142C18.7893 14.0391 19 13.5304 19 13V3C19 2.46957 18.7893 1.96086 18.4142 1.58579C18.0391 1.21071 17.5304 1 17 1H3C2.46957 1 1.96086 1.21071 1.58579 1.58579C1.21071 1.96086 1 2.46957 1 3V13C1 13.5304 1.21071 14.0391 1.58579 14.4142C1.96086 14.7893 2.46957 15 3 15Z" stroke="#14A16F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="ml-4 text-base font-bold lato text-green-dark">Email</p>
                    </div>
                    <input wire:model='email' {{ auth()->user()->isUser() ? 'disabled' : ''}}
                        class="bg-green-100 p-2.5 pl-4 mt-2.5 lato w-full text-green-dark {{ auth()->user()->isUser() ? 'opacity-50' : ''}}"
                        type="text" placeholder="Introdu adresa de email" name="email" style="border-radius: 5px">
                    @error('email') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
                </div>
                <div class="flex mt-12">
                    <button type="submit" class="bg-green-700 px-12 py-3.5 rounded-lg text-white text-xs lato opacity-70">
                        SALVEAZĂ
                    </button>
                </div>
                <x-alerts.success :saved="$savedProfile" :message="$message" ></x-alerts.success>
            </form>
        </div>
        <div wire:key='form2' class="w-1/2 pl-20">
            <p class="text-2xl font-light lato-light text-green-dark mb-9">Schimbă parola</p>
            <form wire:submit.prevent="editPassword" action="#" method="POST">
                <div class="mt-10 mb-8">
                    <div class="flex items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 4.99995C13.5304 4.99995 14.0391 5.21067 14.4142 5.58574C14.7893 5.96081 15 6.46952 15 6.99995L13 4.99995ZM19 6.99995C19.0003 7.93712 18.781 8.86133 18.3598 9.6985C17.9386 10.5357 17.3271 11.2625 16.5744 11.8208C15.8216 12.3791 14.9486 12.7533 14.0252 12.9135C13.1018 13.0736 12.1538 13.0152 11.257 12.743L9 15H7V17H5V19H2C1.73478 19 1.48043 18.8946 1.29289 18.7071C1.10536 18.5195 1 18.2652 1 18V15.414C1.00006 15.1488 1.10545 14.8944 1.293 14.707L7.257 8.74295C7.00745 7.91797 6.93857 7.0489 7.05504 6.1949C7.17152 5.3409 7.47062 4.52202 7.93199 3.794C8.39336 3.06598 9.00616 2.4459 9.72869 1.97597C10.4512 1.50605 11.2665 1.1973 12.1191 1.07076C12.9716 0.944214 13.8415 1.00284 14.6693 1.24264C15.4972 1.48244 16.2637 1.89779 16.9166 2.46042C17.5696 3.02305 18.0936 3.71974 18.4531 4.50309C18.8127 5.28644 18.9992 6.13805 19 6.99995V6.99995Z" stroke="#14A16F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="ml-4 text-base font-bold lato text-green-dark">Parola nouă</p>
                    </div>
                    <input wire:model='password' class="bg-green-100 p-2.5 pl-4 mt-2.5 lato w-full" type="password" placeholder="Introdu parola" name="password" style="border-radius: 5px">
                    @error('password') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
                </div>
                <div class="mt-10 mb-8">
                    <div class="flex items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 4.99995C13.5304 4.99995 14.0391 5.21067 14.4142 5.58574C14.7893 5.96081 15 6.46952 15 6.99995L13 4.99995ZM19 6.99995C19.0003 7.93712 18.781 8.86133 18.3598 9.6985C17.9386 10.5357 17.3271 11.2625 16.5744 11.8208C15.8216 12.3791 14.9486 12.7533 14.0252 12.9135C13.1018 13.0736 12.1538 13.0152 11.257 12.743L9 15H7V17H5V19H2C1.73478 19 1.48043 18.8946 1.29289 18.7071C1.10536 18.5195 1 18.2652 1 18V15.414C1.00006 15.1488 1.10545 14.8944 1.293 14.707L7.257 8.74295C7.00745 7.91797 6.93857 7.0489 7.05504 6.1949C7.17152 5.3409 7.47062 4.52202 7.93199 3.794C8.39336 3.06598 9.00616 2.4459 9.72869 1.97597C10.4512 1.50605 11.2665 1.1973 12.1191 1.07076C12.9716 0.944214 13.8415 1.00284 14.6693 1.24264C15.4972 1.48244 16.2637 1.89779 16.9166 2.46042C17.5696 3.02305 18.0936 3.71974 18.4531 4.50309C18.8127 5.28644 18.9992 6.13805 19 6.99995V6.99995Z" stroke="#14A16F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="ml-4 text-base font-bold lato text-green-dark">Confirmă noua parolă</p>
                    </div>
                    <input wire:model='passwordConfirmation' class="bg-green-100 p-2.5 pl-4 mt-2.5 lato w-full" type="password" placeholder="Introdu parola" name="passwordConfirmation" style="border-radius: 5px">
                    @error('passwordConfirmation') <div wire:key="form" class="text-sm text-red-600"> {{$message}} </div> @enderror
                </div>
                <div class="flex mt-12">
                    <button type="submit" class="bg-green-700 px-12 py-3.5 rounded-lg text-white text-xs lato opacity-70">
                        SCHIMBĂ
                    </button>
                </div>
                <x-alerts.success :saved="$savedPassword" :message="$message" ></x-alerts.success>
            </form>
        </div>
    </div>
</div>
