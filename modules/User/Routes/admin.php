<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function () {
    Route::get("", "UserController@index")->name("index");
    Route::get("create", "UserController@create")->name("create");

    Route::post("store", "UserController@store")->name("store");

});

