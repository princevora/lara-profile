<?php

namespace App\Livewire\Users\Auth;

use App\Models\User;
use App\Rules\Dispoable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class Register extends Component
{
    /**
     * Will be used to save livewire Email state
     * to this var, And it will validate the field
     * 
     * @var string $email
     */

    public string $email;

    /**
     * Will be used to save livewire Password state
     * 
     * @var mixed $password
     */

    public mixed $password;

    /**
     * @var int $stage
     * 
     * The $stage variable will be used to show diffrent forms
     * 1 : Initial Form - Email and password Form
     * 2 : Second Form - Username Form
     * 3 : Last Form - Badges Form
     * 4 : Saving Data to data base
     */
    public int $stage = 1;

    /**
     * @var string $username 
     * 
     * The following variable will be used to save the username state
     * For the form state 2
     */
    public string $username;
    
    /**
     * @var string $name 
     */
    public string $name;

    public array $selectedBadges, $globalErrors = [];

    public function mount()
    {
        connectify('success', 'Connection Found', 'Success Message Here');
    }

    /**
     * @method \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory render()
     */
    public function render()
    {
        return view('livewire.users.auth.register');
    }

    public function placeholder()
    {
        return view("components.loader");
    }

    public function save($sleep = 2): void
    {
        sleep($sleep);

        $this->stage = match ($this->stage) {
            1 => 2,
            2 => 3,

            default => 1, // Set defult to 1 if there is not any matches
        };
    }

    public function saveEmailAndPassword(): void
    {
        // Validate form fields
        $this->validate([
            "name" => "required|min:3",
            "email" => ["required", "email", "unique:users,email", new Dispoable],
            "password" => "required|min:8",
        ]);

        $this->save(0.5);
    }

    /**
     * @param string $username
     * 
     * @return void
     */
    #[On("save:username")]
    public function saveUsername(string $username)
    {
        // Initialize the username value
        $this->username = $username;

        // Save the step to 3
        $this->save(0);
    }

    /**
     * @param array<int, int> $selectedBadges
     * 
     * @return void
     */
    #[On("save:badges")]
    public function saveBadges(array $selectedBadges): void
    {
        $this->selectedBadges = $selectedBadges;

        // Set the stage to saving
        $this->stage = 4;

        // Finally create user After all the process has been done
        $this->dispatch("save:user")->self();
    }

    #[On("save:user")]
    public function createUser()
    {
        try {
            $user           = new User;
            $user->name     = $this->name;
            $user->email    = $this->email;
            $user->username = $this->username;
            $user->password = Hash::make($this->password);
            $user->badges   = json_encode($this->selectedBadges);

            $user->save();

            sleep(1);

            $credentials = ['email' => $this->email, 'password' => $this->password];

            Auth::attempt($credentials, true);

            return $this->redirectRoute("user.dashboard", navigate: true);
            
        } catch (\Throwable $th) {
            $this->globalErrors[] = "Faild To Save User, Existed With the Following details</br></br> Message: <code class='text-red-500'>{$th->getMessage()} </code> </br></br>  Code: <code class='text-red-500'>{$th->getCode()}</code>";
        }
    }
}
