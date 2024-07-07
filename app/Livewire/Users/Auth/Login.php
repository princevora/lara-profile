<?php

namespace App\Livewire\Users\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    /**
     * @var string $email
     */
    #[Validate("required|email|exists:users,email", message: ['exists' => "The provided email does not found."])]
    public string $email;

    /**
     * @var string $password
     */
    #[Validate("required")]
    public string $password;


    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.users.auth.login');
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */

    public function placeholder()
    {
        return view("components.loader");
    }

    public function save()
    {
        // Validate details
        $this->validate();

        // Validate password
        if (!$this->validatePassword()) {
            return throw ValidationException::withMessages(
                [
                    'password' => 'The password Doest not match'
                ]
            );
        }

        if(Auth::attempt([
                'email' => $this->email, 
                'password' => $this->password
            ], true)
        ){
            return $this->redirectRoute("user.dashboard", navigate: true);
        }
    }

    /**
     * @return bool
     */
    private function validatePassword(): bool
    {
        // Get the hashed password value from database
        $hashedPassword = User::where("email", $this->email)
            ->first();

        // Check and return bool
        return Hash::check($this->password, $hashedPassword->password);
    }
}
