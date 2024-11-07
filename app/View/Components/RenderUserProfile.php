<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RenderUserProfile extends Component
{

    public $profile, $badges;

    /**
     * Create a new component instance.
     */
    public function __construct($profile, $badges)
    {
        $this->profile = $profile;
        $this->badges  = $badges;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.render-user-profile');
    }
}
