<?php

namespace Modules\Department\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Designation\Models\Designation;
use Modules\User\Models\User;

class Department extends Model
{
    use HasFactory;

    protected $table = "departments";

    protected $fillable = [
        "name",
        "description",
        "manager_id",
        "location",
        "budget",
        "status",
        "phone",
        "email",
        "user_create",
        "user_update"
    ];

    public function designations()
    {

    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Designation::class);
    }

}
