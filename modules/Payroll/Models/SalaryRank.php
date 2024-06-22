<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class SalaryRank extends Model
{
    use HasFactory;

    protected $table = "salary_ranks";

    protected $fillable = [
        "rank",
        "coefficient",
        "from",
        "description"
    ];


}
