<?php

namespace App\Livewire\Users\Dashboard;

use App\Livewire\Users\Auth\RegisterBadges;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportEvents\Event;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    #[Validate("image|mimes:png,jpg,jpeg,webp,svg|max:5120")]
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
     * User hobbies badges to store selected badges
     * 
     * Accesable using register.user-badges component
     * 
     * @var array $userBadges
     */
    public array $userBadges = [];

    /**
     * Will be used to store the user's name that will be changable
     * 
     * @var string $name
     */
    public string $name;

    /**
     * This variable will store the user's bio in string format
     * 
     * @var string $bio
     */
    public string  $bio;

    /**
     * const DEFAULT_SAVE_PATH Will be used for livewire file saving
     * This will be used in the updateUserMedia method
     * 
     * The files will be stored in the public directory in storage folder
     * 
     * @var string
     */
    private const DEFAULT_SAVE_PATH = "public/users/media/";

    /**
     * const DEFAULT_USER_MEDIA_DATABASE_PATH will be used for users
     * to store the media (avatar, banner) paths 
     * 
     * the files will be saved in the storage directory 
     * we can access the pages by replacing the storage to public
     * 
     * @var string
     */
    private const DEFAULT_USER_MEDIA_DATABASE_PATH = "storage/users/media/";

    /**
     * UserAvatar is the variable is default set to null if the user 
     * Have saved any avatar then it should be string assgined to this variable
     * same as $userBanner
     * @var null|string $userAvatar
     */
    public null | string $userAvatar = null;

    /**
     * @var null|string $userBanner
     */
    public null | string $userBanner = null;
    
    /**
     * @return void
     */
    public function mount()
    {
        
        // Set user from the auth
        $this->user         = Auth::user();
        $this->bio          = $this->user->bio; //Set bio
        $this->name         = $this->user->name; //Set user's Name
        $this->userBadges   = json_decode($this->user->badges, true); //Set user badges
        $this->accentColor  = $this->user->accent_color; //set accentColor 
        $this->gradientView = $this->user->is_gradient_view; //Set gradientView (boolean)

        // Check if the user have the avatar saved for profile
        if (Storage::disk('public')->exists(str_replace("storage/", "", $this->user->avatar_path))) {
            $this->userAvatar = $this->user->avatar_path;
        }

        // Check if the user have the banner saved for profile
        if (Storage::disk('public')->exists(str_replace("storage/", "", $this->user->banner_path))) {
            $this->userBanner = $this->user->banner_path;
        }
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
        // Set the userBanner to null
        $this->userBanner = null;

        return $this->validateOnly($this->banner);
    }

    /**
     * @return Livewire\Features\SupportValidation\HandlesValidation::validateOnly
     */
    public function updatedAvatar()
    {
        // Set the userAvatar to null
        $this->userAvatar = null;

        return $this->validateOnly($this->avatar);
    }

    /**
     * @return Livewire\Features\SupportValidation\HandlesValidation::validateOnly
     */
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
        if ($this->previewImage instanceof TemporaryUploadedFile) {
            $this->previewImage = null;
        }

        $this->dispatch("updated:accent_color", $this->accentColor)->to(RegisterBadges::class);
    }

    /**
     * @return void
     */
    public function setVieType(): void
    {
        $this->gradientView = !$this->gradientView;
    }

    /**
     * @return void
     */
    public function save(): void
    {
        // Validate fields.
        $this->validate([
            "name"        => "required",
            "bio"         => "required",
            "accentColor" => "required",
        ]);

        // Validate images
        // if(is_null($this->avatar) || is_null($this->userAvatar))

        // Disptach Event to get the selected user badges
        $this->dispatch("get:user_badges")->to(RegisterBadges::class);
    }

    /**
     * Continue if the selected badges is have been assigned
     */
    #[On("save:user")]
    public function saveUser()
    {
        if (!is_null($this->avatar) || !is_null($this->banner)) {
            $this->updateProfileMedia();
        }

        User::query()
            ->where("id", $this->user->id)
            ->update([
                'is_gradient_view' => $this->gradientView,
                'accent_color'     => $this->accentColor,
                'badges'           => $this->userBadges,
                'name'             => $this->name,
                'bio'              => $this->bio,
            ]);
    }

    /**
     * @return void
     */
    public function removeAvatar(): void
    {
        // Check if the User has temporary avatar or saved avatar
        if($this->avatar instanceof TemporaryUploadedFile) {
            $this->avatar = null;  //Set the avatar to null
            
            // return from here
            return;
        }
        
        // Check if the user has the saved avatar and check the avatar existence in storage
        if($this->userAvatar) {
            $userAvatarPath = str_replace("storage/", "", $this->user->avatar_path);
            if(!Storage::disk('public')->exists($userAvatarPath)){
                throw ValidationException::withMessages(['avatar' => "Unable to find the avatar"]);
            }

            // Delete the User's avatar From the storage
            if(Storage::disk('public')->delete($userAvatarPath)){
                // Remove the avatar path from db
                User::query()
                    ->where("id", $this->user->id)
                    ->update(['avatar_path' => null]);

                $this->userAvatar = null;

            }
        }
        
        return;
    }

    /**
     * @return void
     */
    public function removeBanner(): void
    {
        // Check if the User has temporary banner or saved banner
        if($this->banner instanceof TemporaryUploadedFile) {
            $this->banner = null;  //Set the banner to null
            
            // return from here
            return;
        }
        
        // Check if the user has the saved banner and check the banner existence in storage
        if($this->userBanner) {
            $userBannerPath = str_replace("storage/", "", $this->user->banner_path);
            if(!Storage::disk('public')->exists($userBannerPath)){
                throw ValidationException::withMessages(['banner' => "Unable to find the banner"]);
            }

            // Delete the User's Banner From the storage
            if(Storage::disk('public')->delete($userBannerPath)){

                // Remove the banner path from db
                User::query()
                    ->where("id", $this->user->id)
                    ->update(['banner_path' => null]);

                $this->userBanner = null;
            }
        }
        
        return;
    }

    private function updateProfileMedia()
    {
        // Initialize the media file details for avatar and banner
        $mediaFiles = [
            'avatar' => [
                'path' => $this->avatar instanceof TemporaryUploadedFile ? '' : $this->userAvatar, 
                'fileName' => '', 
                'folder' => 'avatar', 
                'storage_path' => ''
            ],
            'banner' => [
                'path' => $this->banner instanceof TemporaryUploadedFile ? '' : $this->userBanner,
                'fileName' => '', 
                'folder' => 'banner', 
                'storage_path' => ''
            ],
        ];

        // Loop through each media type (avatar and banner) to handle uploads
        foreach ($mediaFiles as $type => &$media) {
            // Check if the current media file is not null
            if (!is_null($this->$type) && $this->$type instanceof TemporaryUploadedFile) {
                // Set the save path and file name for the media file
                $media['path'] = self::DEFAULT_USER_MEDIA_DATABASE_PATH . $media['folder'] . "/";
                $media['storage_path'] = self::DEFAULT_SAVE_PATH . $media['folder'] . "/";
                $media['fileName'] = $this->user->username . "." . $this->$type->getClientOriginalExtension();

                // Store the media file in the designated folder
                $this->$type->storeAs($media['storage_path'], $media['fileName']);
            }
        }

        // Update the user's avatar and banner paths in the database
        User::query()
            ->where("id", $this->user->id)
            ->update([
                'avatar_path' => $mediaFiles['avatar']['path'] . $mediaFiles['avatar']['fileName'],
                'banner_path' => $mediaFiles['banner']['path'] . $mediaFiles['banner']['fileName']
            ]);
    }

    /**
     * @param array<int, int> $badges
     * @return void
     */

    /**
     *@return \Livewire\Features\SupportEvents\Event
     */

    #[On("recive:user_badges")]
    public function getUserBadges(array $badges): Event
    {
        $this->userBadges = $badges;

        // Dispatch the event to self
        return $this->dispatch("save:user")->self();
    }
}
