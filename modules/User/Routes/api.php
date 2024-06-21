<?php

use Illuminate\Support\Facades\Route;


Route::prefix("user")->name("user.")->group(function () {

    Route::get("/", "UserController@index")->name("index");

});

