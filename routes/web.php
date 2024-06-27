<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("auth")->group(function () {
    Route::view('register', 'pages.users.auth.register')->name("auth.register");
});

Route::prefix("u")->group(function () {
    Route::view('dashboard', 'pages.users.dashboard.index')->name("user.dashboard");
});
