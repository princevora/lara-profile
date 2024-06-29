<?php

namespace App\Livewire\Users\Auth;

use App\Models\Badge;
use App\Rules\Dispoable;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
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
     * 2 : Last Form - Badges Form
     */
    public int $stage = 1;

    /**
     * @var string $username 
     * 
     * The following variable will be used to save the username state
     * For the form state 2
     */
    public string $username;

    public $selectedBadges = [];

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

    public function save(): void
    {
        sleep(2);

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
            "email" => ["required", "email", "unique:users,email", new Dispoable],
            "password" => "required|min:8",
        ]);

        $this->save();
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
        $this->save();
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
    }

    /**
     * @return void
     */

    public function submit()
    {
        $this->validate([
            "selectedBadges" => "required|array",
        ]);

        dd($this->email, $this->username, $this->password, $this->selectedBadges);
        // $this->save();
    }
}
