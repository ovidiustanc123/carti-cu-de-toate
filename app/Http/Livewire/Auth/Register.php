<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    protected $messages = [
        'email.required' => 'Adresa de email este obligatorie.',
        'email.email' => 'Adresa de email nu este validă.',
        'email.unique' => 'Această adresă de email este deja folosită.',
        'name.required' => 'Numele este obligatoriu.',
        'password.required' => 'Parola este obligatorie.',
        'password.min' => 'Parola trebuie să aibă minim 8 caractere.',
        'password.same' => 'Parolele nu se potrivesc.',
    ];

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'role_id' => 2
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(url('/'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
