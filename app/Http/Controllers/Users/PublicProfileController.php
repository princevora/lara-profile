<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        list($profile, $badges) =  $this->getUserData($request);

        return view("pages.profile.user-profile")->with(compact('profile', 'badges'));
    }
    
    public function embedUserProfile(Request $request)
    {
        list($profile, $badges) =  $this->getUserData($request);
    
        return view('pages.api.embed.profile')->with(compact('profile', 'badges'));
        
    }

    private function getUserData(Request $request)
    {
        $profile = User::query()->where('username', $request->username)
            ->firstOrFail([
                "name",
                "username",
                "badges",
                "bio",
                "accent_color",
                "is_gradient_view",
                "banner_path",
                "avatar_path",
                "created_at",
                "updated_at"
            ]);

        $badges = Badge::all()->toArray();

        return [$profile, $badges];
    }
}
