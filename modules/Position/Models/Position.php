<?php

namespace Modules\Position\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Models\Department;

class Position extends Model
{
    use HasFactory;

    protected $table = "positions";

    protected $fillable = [
        "title",
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
        "views",
        "department_id",
        "designation_id",
        "user_create",
        "user_update"
    ];

    protected $casts = [
        "start_date" => "date",
        "expired_date" => "date",
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id", 'id');
    }

}
