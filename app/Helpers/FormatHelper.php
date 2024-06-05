<?php

use Illuminate\Support\Str;

function limit($words, $limit) {
    return Str::limit($words, 7);
}

function mask($words, $symb, $index) {
    return Str::mask($words, $symb, $index);
}
