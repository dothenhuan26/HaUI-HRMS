<?php

use Illuminate\Support\Facades\Route;

Route::prefix("jobs")->name("job.")->group(function () {
    Route::get("/", "PositionController@index")->name("index");
    Route::prefix("{slug}")->name("detail.")->group(function () {
        Route::get("/", "PositionController@detail")->name("view");
        Route::post("send-cv", "PositionController@receiveCV")->name("send-cv");
    });

});
