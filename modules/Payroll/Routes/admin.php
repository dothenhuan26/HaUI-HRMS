<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::get("", "PayrollController@index")->name("index");
    Route::get("update/{id}", "PayrollController@update")->name("update");
    Route::post("store/{id?}", "PayrollController@store")->name("store");
});
