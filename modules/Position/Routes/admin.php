<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "PositionController@index")->name("index");
    Route::get("create", "PositionController@create")->name("create");
    Route::get("update/{id}", "PositionController@update")->name("update");
    Route::post("store/{id?}", "PositionController@store")->name("store");
    Route::get("delete/{id}", "PositionController@delete")->name("delete");

});
