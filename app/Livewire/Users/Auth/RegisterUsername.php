<?php

namespace App\Livewire\Users\Auth;

use Illuminate\Support\Facades\Context;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterUsername extends Component
{
    public bool $isLoading = false;

    /**
     * @var string $username 
     */
    #[Validate("required|min:3|alpha_dash|unique:users,username")]
    public string $username;

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.users.auth.register-username');
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function placeholder()
    {
        return view("components.spinner");
    }

    /**
     * @return \Livewire\Features\SupportEvents\Event
     */
    public function save()
    {
        // Validate form fields
        $this->validate();

        return $this->dispatch("save:username", $this->username)->to(Register::class);
    }
}
