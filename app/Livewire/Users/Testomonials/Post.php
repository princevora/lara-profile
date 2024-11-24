<?php

namespace App\Livewire\Users\Testomonials;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Post extends Component
{
    public User $user;

    public function mount(Request $request)
    {
        $this->user = User::where('username', $request->username)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.users.testomonials.post');
    }
}
