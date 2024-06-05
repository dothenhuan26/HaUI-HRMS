<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "DesignationController@index")->name("index");
    Route::get("create", "DesignationController@create")->name("create");
    Route::get("update/{id}", "DesignationController@update")->name("edit");
    Route::post("store/{id?}", "DesignationController@store")->name("store");
    Route::get("delete/{id}", "DesignationController@delete")->name("delete");

});
