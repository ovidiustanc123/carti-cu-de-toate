<?php

namespace App\Http\Livewire\Auth\Passwords;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class Email extends Component
{
    /** @var string */
    public $email;

    /** @var string|null */
    public $emailSentMessage = false;

    protected $messages = [
        'email.required' => 'Adresa de email este obligatorie.',
        'email.email' => 'Adresa de email nu este validă.',
    ];

    public function sendResetPasswordLink()
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    public function render()
    {
        return view('livewire.auth.passwords.email');
    }
}
