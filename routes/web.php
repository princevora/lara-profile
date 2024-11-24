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

Route::prefix("u")->middleware("auth")->name('user.')->group(function () {
    Route::view('dashboard', 'pages.users.dashboard.index')->name("dashboard");
    Route::view('socials', 'pages.users.dashboard.manage-socials')->name('socials');
    Route::get("logout", [AuthController::class, 'logout'])->name("logout");
    Route::prefix('testomonials')->name('testomonials.')->group(function () {
        Route::view('share-link', 'pages.users.dashboard.testomonials.link')->name('link');
    });
});

Route::prefix('testomonials')->name('testomonials.')->group(function () {

});

Route::prefix('api')->name('api.')->group(function () {
    Route::get('embed/{username}', [PublicProfileController::class, 'embedUserProfile'])->name('embed.profile');
});

Route::prefix("profile")->name('profile.')->group(function () {
    Route::get('{username}', PublicProfileController::class)->name('show');
});
