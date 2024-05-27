<?php

namespace Modules\Position\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = "positions";

    protected $fillable = [
        "title",
        "location",
        "description",
        "vacancies",
        "age",
        "job_type",
        "experiences",
        "start_date",
        "expired_date",
        "salary_from",
        "salary_to",
        "status",
        "department_id",
        "designation_id",
        "user_create",
        "user_update"
    ];


}
