<?php

use Illuminate\Support\Facades\Route;

Route::prefix("payroll")->middleware("auth")->name("payroll.admin.")->group(function () {
    Route::get("", "PayrollController@index")->name("index");
    Route::get("update/{id}", "PayrollController@update")->name("update");
    Route::post("store/{id?}", "PayrollController@store")->name("store");
});

Route::prefix("rank")->middleware("auth")->name("rank.admin.")->group(function () {
    Route::get("", "SalaryRankController@index")->name("index");
    Route::get("detail", "SalaryRankController@detail")->name("detail");
    Route::post("store/{id?}", "SalaryRankController@store")->name("store");
});
