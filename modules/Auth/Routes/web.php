<?php

use Illuminate\Support\Facades\Route;

Route::prefix("")->group(function () {
    Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
    Route::post("login", "Auth\LoginController@login");
    Route::post("logout", "Auth\LoginController@logout")
        ->middleware("auth")
        ->name("logout");
});
