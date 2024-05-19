<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{

    protected $table = 'core_role_permissions';

    protected $fillable = [
        'role_id',
        'permission'
    ];

}
