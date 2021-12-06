<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserEdit extends Component
{

    public $currentUser;
    public $name;
    public $email;
    public $oldPassword;
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

    public function mount(User $user) {
        $this->currentUser = $user;
        $this->name = $this->currentUser->name;
        $this->email = $this->currentUser->email;
    }

    public function editProfile() {
        if($this->name != $this->currentUser->name || $this->email != $this->currentUser->email) {  //check if there are changes in the original values
            $user = User::where('email', $this->currentUser->email);
            $this->validate([
                'name' => 'required|max:15',
                'email' => ['email', 'required', Rule::unique('users', 'email')->ignore($this->currentUser)],
            ]);
            $this->currentUser->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
            $this->emitSelf('profile-save');
        }
    }

    public function editPassword() {
        if(!Hash::check($this->password, $this->currentUser->password)) {   //check if the new password is the same with the old one
            $this->validate([
                'password' => 'same:passwordConfirmation|min:6'
            ]);
            $this->currentUser->update([
                'password' => Hash::make($this->password)
            ]);
            $this->emitSelf('password-save');
        }
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}
