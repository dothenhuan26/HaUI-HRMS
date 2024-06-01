<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "DepartmentController@index")->name("index");
    Route::get("create", "DepartmentController@create")->name("create");

    Route::post("store", "DepartmentController@store")->name("store");

});
