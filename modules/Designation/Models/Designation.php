<?php

namespace Modules\Designation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $table = "designations";

    protected $fillable = [
        "name",
        "user_create",
        "user_update",
    ];

}
