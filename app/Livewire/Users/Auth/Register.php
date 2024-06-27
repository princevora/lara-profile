<?php

namespace App\Livewire\Users\Auth;

use App\Models\Badge;
use Illuminate\Database\Eloquent\Collection;
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

    #[Validate("required|email|string")]
    public string $email;

    /**
     * Will be used to save livewire Password state
     * 
     * @var mixed $password
     */

    #[Validate("required|min:8")]
    public mixed $password;

    /**
     * @var int $stage
     * 
     * The $stage variable will be used to show diffrent forms
     * 1 : Initial Form - Email and password Form
     */
    public int $stage = 3;

    /**
     * @var string $username 
     * 
     * The following variable will be used to save the username state
     * For the form state 2
     */
    public string $username;

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

    public function save()
    {
        // Validate form fields
        // $this->validate();

        sleep(2);

        $this->stage = match ($this->stage) {
            1 => 2,
            2 => 3,

                // Set defult to 1 if there is not any matches
            default => 1,
        };
    }

    public function register()
    {
        return 1;
    }

    /**
     * @param int $id
     */
    public function removeBadge(int $id)
    {
        // Check if the value exists in the selected badges strictly
        if(strictCheckValue($id, $this->selectedBadges)){

            // Run a foreachloop to get keys and values
            foreach ($this->selectedBadges as $key => $value) {

                // If the value and the id matches then unset the key - value
                if($value == $id){
                    unset($this->selectedBadges[$key]);
                }
            }
        }
    }

    public function addBadge(int $id)
    {
        if($this->badges instanceof Collection && !strictCheckValue($id, $this->selectedBadges)){
            $this->selectedBadges[] = $id;
        }
    }

    public function click()
    {
        dd($this->selectedBadges);
    }
}
