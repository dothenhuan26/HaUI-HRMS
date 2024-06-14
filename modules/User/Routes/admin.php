<?php

use Illuminate\Support\Facades\Route;


Route::middleware("auth")->group(function () {
    Route::get("", "UserController@index")->name("index");
    Route::get("create", "UserController@create")->name("create");
    Route::get("update/{id}", "UserController@update")->name("update");
    Route::post("store/{id?}", "UserController@store")->name("store");
    Route::get("delete/{id}", "UserController@delete")->name("delete");

    Route::get("contract/{id}", "UserController@contract")->name("contract");
    Route::post("contract/{id}", "UserController@updateContract")->name("update-contract");

    Route::prefix("role")->name("role.")->group(function () {
        Route::get('/', 'RoleController@index')->name("index");
        Route::get('create', 'RoleController@create')->name("create");
        Route::get('permission-matrix', 'RoleController@permissionMatrix')->name("permission-matrix");
        Route::post('permission-matrix', 'RoleController@updatePermissionMatrix');


    });

});

