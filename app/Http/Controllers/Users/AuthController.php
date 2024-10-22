<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * @return mixed | \Illuminate\Http\RedirectResponse
     */
    public function logout(): ?RedirectResponse
    {
        // Logout user
        Auth::logout();

        // Redirect to login
        return redirect()->route('login');
    }
}
