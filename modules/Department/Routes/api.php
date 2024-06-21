<?php

use Illuminate\Support\Facades\Route;

Route::prefix("department")->name("department.")->group(function () {
    Route::get("/{department_id}/users", "DepartmentController@users")->name("users");


});
