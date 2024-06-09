<?php

use Illuminate\Support\Facades\Route;

Route::get('file-pond', function () {
    $data = [
        "page_title" => "File Pond",
    ];
    return view("Media::admin.index", $data);
});
