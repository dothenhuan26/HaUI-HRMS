<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "DepartmentController@index")->name("index");
    Route::get("create", "DepartmentController@create")->name("create");
    Route::get("update/{id}", "DepartmentController@update")->name("update");
    Route::post("store/{id?}", "DepartmentController@store")->name("store");
    Route::get("delete/{id}", "DepartmentController@delete")->name("delete");

});
