<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "HolidayController@index")->name("index");
    Route::get("create", "HolidayController@create")->name("create");
    Route::get("update/{id}", "HolidayController@update")->name("update");
    Route::post("store/{id?}", "HolidayController@store")->name("store");
    Route::get("delete/{id}", "HolidayController@delete")->name("delete");

});
