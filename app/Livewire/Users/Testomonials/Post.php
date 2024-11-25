<?php

namespace App\Livewire\Users\Testomonials;

use App\Models\Testomonial;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Post extends Component
{
    /**
     * @var User $uer
     */
    public User $user;

    /**
     * @var string $name
     */
    #[Validate('required|max:50')]
    public string $name;

    /**
     * @var string $description
     */
    #[Validate('required')]
    public string $description;

    public function mount(Request $request)
    {
        $this->user = User::where('username', $request->username)->firstOrFail();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.users.testomonials.post');
    }

    public function save()
    {
        $this->validate();

        
    }
}
