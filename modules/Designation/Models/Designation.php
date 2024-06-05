<?php

namespace Modules\Designation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Models\Department;

class Designation extends Model
{
    use HasFactory;

    protected $table = "designations";

    protected $fillable = [
        "name",
        "description",
        "requirements",
        "responsibilities",
        "salary_from",
        "salary_to",
        "status",
        "user_create",
        "user_update",
        "department_id"
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id", "id");
    }

}
