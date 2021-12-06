<?php

namespace App\Http\Livewire\Auth\Passwords;

use Livewire\Component;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    protected $messages = [
        'password.required' => 'Parola este obligatorie.',
        'password.password' => 'Parola nu este validă'
    ];

    public function confirm()
    {
        $this->validate([
            'password' => 'required|password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(url('/'));
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm');
    }
}
