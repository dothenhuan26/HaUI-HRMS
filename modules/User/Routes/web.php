<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")->prefix("user")->group(function () {

    Route::get("profile/{code}", "UserController@profile")->name("profile");



});

