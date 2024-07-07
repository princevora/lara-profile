<?php

namespace App\Livewire\Users\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    #[Validate("image|mimes:png,jpg,jpeg,webp,svg")]
    public $banner, $avatar, $previewImage;

    public $user;

    /**
     * @var string $accentColor
     */
    public string $accentColor;

    /**
     * @var bool $gradientView
     */
    public bool $gradientView = false;

    /**
     * @var array $userBadges
     */
    public array $userBadges = []; 

    /**
     * @return void
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->userBadges = json_decode($this->user->badges, true);
        $this->accentColor = $this->user->accent_color;
    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.users.dashboard.user-profile');
    }

    /**
     * @return Livewire\Features\SupportValidation\HandlesValidation::validateOnly
     */
    public function updatedBanner()
    {
        return $this->validateOnly($this->banner);
    }

    /**
     * @return Livewire\Features\SupportValidation\HandlesValidation::validateOnly
     */
    public function updatedAvatar()
    {
        return $this->validateOnly($this->avatar);
    }

    public function updatedPreviewImage()
    {
        return $this->validateOnly($this->previewImage);
    }

    /**
     * @param string $hex
     * @return void
     */
    public function setAccentColor(string $hex): void
    {
        $this->accentColor = $hex;

        // To preview to accent view we need to clear the image or set it to null
        if($this->previewImage instanceof TemporaryUploadedFile){
            $this->previewImage = null;
        }
    }

    /**
     * @return void
     */
    public function setVieType(): void
    {
        $this->gradientView = !$this->gradientView;

    }

    #[On("save:badges")]
    public function listen($params)
    {
        dd($params);
    }
}
