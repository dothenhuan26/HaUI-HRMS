<?php

use Illuminate\Support\Facades\Route;

Route::prefix("chat")->name("chat.")->group(function () {
    Route::prefix("public")->name("public")->group(function () {
        Route::get("/index", "ChatController@indexDemo")->name("index.demo");
        Route::post("message", "ChatController@messageReceivedDemo")->name("message");

        Route::get("/", "ChatController@index")->name("index");

    });

});
