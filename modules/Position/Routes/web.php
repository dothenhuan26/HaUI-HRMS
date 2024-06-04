<?php

use Illuminate\Support\Facades\Route;

Route::prefix("job")->name("job.")->group(function () {
    Route::get("/", "PositionController@index")->name("index");
    Route::prefix("detail/{id}")->name("detail.")->group(function () {
        Route::get("/", "PositionController@detail")->name("view");
        Route::post("send-cv", "PositionController@receiveCV")->name("send-cv");
    });

});
