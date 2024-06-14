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
        "description",
        "user_create",
        "user_update",
    ];

    protected $casts = [
        "holiday_date" => "date:m/d/Y",
    ];

    public function setHolidayDateAttribute($value)
    {
        $this->attributes['holiday_date'] = date('Y-m-d', strtotime($value));
    }

    public function getHolidayDateAttribute($value)
    {
        return date('m/d/Y', strtotime($value));
    }

}
