<?php

namespace App\Livewire\Users\Auth;

use Livewire\Component;
use Livewire\Features\SupportEvents\Event;

class RegisterUsername extends Component
{
    /**
     * @var string $username 
     */
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
    public function save(): Event
    {
        // Validate form fields
        $this->validate();

        return $this->dispatch("save:username", $this->username);
    }
}
