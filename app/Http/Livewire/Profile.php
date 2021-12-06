<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public User $user;

    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;

    public $message = "Schimbările au fost salvate cu succes!";
    public $savedProfile = "profile-save";
    public $savedPassword = "password-save";

    protected $messages = [
        'email.required' => 'Adresa de email este obligatorie.',
        'email.email' => 'Adresa de email nu este validă.',
        'email.unique' => 'Această adresă de email este deja folosită.',
        'name.required' => 'Numele este obligatoriu.',
        'name.max' => 'Numele poate fi de maxim 15 caractere',
        'password.required' => 'Parola este obligatorie.',
        'password.min' => 'Parola trebuie să aibă minim 8 caractere.',
        'password.same' => 'Parolele nu se potrivesc.',
    ];

    public function mount() {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function editProfile() {
        if($this->name != $this->user->name || $this->email != $this->user->email) {  //check if there are changes in the original values
            $this->validate([
                'name' => 'required|max:15',
                'email' => ['email', 'required', Rule::unique('users', 'email')->ignore(auth()->user())],
            ]);
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->emitSelf('profile-save');
        }
    }

    public function editPassword() {
        if(!Hash::check($this->password, $this->user->password)) {   //check if the new password is the same with the old one
            $this->validate([
                'password' => 'same:passwordConfirmation|min:8|required'
            ]);
            $this->user->update([
                'password' => Hash::make($this->password)
            ]);
            $this->emitSelf('password-save');
        }
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
