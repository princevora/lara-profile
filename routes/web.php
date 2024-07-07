<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get("logout", function(){
        return Auth::logout();
    });
});
