<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Traits\HasRoles;

class User extends Model
{
    use HasFactory;
    use HasRoles;
}
