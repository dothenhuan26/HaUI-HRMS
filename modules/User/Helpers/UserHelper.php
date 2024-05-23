<?php

function username($default = "")
{
    return \Illuminate\Support\Facades\Auth::user()->name ?? $default;
}
