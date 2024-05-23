<?php

use Illuminate\Support\Facades\Route;

Route::prefix("")->group(function () {
    Route::get("/", function () {
        return view("Dashboard::admin.index");
    });
});
