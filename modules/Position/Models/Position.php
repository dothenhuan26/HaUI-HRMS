<?php

namespace Modules\Position\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Models\BaseModel;
use Modules\Department\Models\Department;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Position extends BaseModel
{
    use HasFactory;

    protected $table = "positions";

    protected $fillable = [
        "title",
        "slug",
        "location",
        "description",
        "vacancies",
        "candidates",
        "age",
        "job_type",
        "experiences",
        "requirements",
        "responsibilities",
        "start_date",
        "expired_date",
        "salary_from",
        "salary_to",
        "status",
        "contact",
        "views",
        "department_id",
        "designation_id",
        "user_create",
        "user_update"
    ];

    protected $casts = [
        "start_date"   => "datetime:m/d/Y",
        "expired_date" => "datetime:m/d/Y",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id", 'id');
    }

//    public function startDate()
//    {
//        return Attribute::make(
//            set: fn(string $value) => date('Y-m-d', strtotime($value)),
//        );
//    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = date('Y-m-d', strtotime($value));
    }

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = date('Y-m-d', strtotime($value));
    }

}
