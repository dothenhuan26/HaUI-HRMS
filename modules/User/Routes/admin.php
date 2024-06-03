<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function () {
    Route::get("", "UserController@index")->name("index");
    Route::get("create", "UserController@create")->name("create");
    Route::get("update/{id}", "UserController@update")->name("update");
    Route::post("store/{id?}", "UserController@store")->name("store");
    Route::get("delete/{id}", "UserController@delete")->name("delete");
});

