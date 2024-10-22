<?php

use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\PublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("auth")->middleware("guest")->group(function () {
    Route::view('register', 'pages.users.auth.register')->name("register");
    Route::view('login', 'pages.users.auth.login')->name("login");
});

Route::prefix("u")->middleware("auth")->group(function () {
    Route::view('dashboard', 'pages.users.dashboard.index')->name("user.dashboard");
    Route::view('socials', 'pages.users.dashboard.manage-socials')->name('user.socials');
    Route::get("logout", [AuthController::class, 'logout'])->name("user.logout");
});

Route::prefix("profile")->name('profile.')->group(function () {
    Route::get('{username}', PublicProfileController::class)->name('show');
});
