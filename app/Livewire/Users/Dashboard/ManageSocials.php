<?php

namespace App\Livewire\Users\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ManageSocials extends Component
{
    /**
     * @var $user
     */
    public $user;

    /**
     * @var array $networks
     */
    public $networks = [
        'github',
        'linkedin',
        'upwork',
        'minecraft',
        'instagram',
    ];

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->user = Auth::user();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.users.dashboard.manage-socials');
    }
}
