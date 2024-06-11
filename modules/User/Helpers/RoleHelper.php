<?php

function roleIds($default = "")
{
    return \Modules\User\Models\Role::all()->pluck('id');
}
