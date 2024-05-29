<?php

namespace Modules\Holiday\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $table = "holidays";

    protected $fillable = [
        "title",
        "holiday_date",
        "day_of_week",
        "user_create",
        "user_update",
    ];


}
