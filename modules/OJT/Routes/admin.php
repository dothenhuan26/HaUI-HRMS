<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "OjtController@index")->name("index");
    Route::get("create", "OjtController@create")->name("create");
    Route::get("update/{id}", "OjtController@update")->name("update");
    Route::post("store/{id?}", "OjtController@store")->name("store");
    Route::get("delete/{id}", "OjtController@delete")->name("delete");

});
