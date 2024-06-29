<?php

namespace App\Livewire\Users\Auth;

use App\Models\Badge;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;

class RegisterBadges extends Component
{
    /**
     * @var $badges
     * 
     */
    public $badges;

    public $selectedBadges = [];

    public function mount()
    {
        $this->badges = Badge::all();
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.users.auth.register-badges');
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
        return $this->dispatch("save:badges", $this->selectedBadges);
    }

    /**
     * @param int $id
     */
    public function removeBadge(int $id)
    {
        // Check if the value exists in the selected badges strictly
        if (strictCheckValue($id, $this->selectedBadges)) {

            // Run a foreachloop to get keys and values
            foreach ($this->selectedBadges as $key => $value) {

                // If the value and the id matches then unset the key - value
                if ($value == $id) {
                    unset($this->selectedBadges[$key]);
                }
            }
        }
    }

    public function addBadge(int $id)
    {
        if ($this->badges instanceof Collection && !strictCheckValue($id, $this->selectedBadges)) {
            $this->selectedBadges[] = $id;
        }
    }
}
