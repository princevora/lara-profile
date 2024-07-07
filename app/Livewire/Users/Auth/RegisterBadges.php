<?php

namespace App\Livewire\Users\Auth;

use App\Models\Badge;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;

class RegisterBadges extends Component
{
    /**
     * @var $badges
     * 
     */
    public $badges;

    #[Validate("required|array")]
    public $selectedBadges = [];

    /**
     * @var bool $showTitle
     */
    public bool $showTitle;

    /**
     * @var string $pageTitle
     */
    public string $pageTitle;

    public bool $isForm;

    /**
     * @param bool   $showTitle     // Boolean value to decide show the heading on the form or not
     * @param string $pageTitle     // String value to show the heading on the form
     * @param bool   $isForm        // Boolean value for considering the component behaves like a form
     * @param array  $primaryBadges // Array value for Selecting primary badges
     * @return void
     */
    public function mount(
        $showTitle = false, 
        $pageTitle = "Add Badges", 
        $isForm = false, 
        array $primaryBadges = []
    ): void
    {
        $this->badges         = Badge::all();
        $this->pageTitle      = $pageTitle;
        $this->showTitle      = $showTitle;
        $this->isForm         = $isForm;
        $this->selectedBadges = $primaryBadges;
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
        // Validate the badges
        $this->validate();

        return $this->dispatch("save:badges", $this->selectedBadges)->to(Register::class);
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
