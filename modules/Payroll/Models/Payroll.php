<?php

namespace Modules\Payroll\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Payroll extends Model
{
    use HasFactory;

    protected $table = "payrolls";

    protected $fillable = [
        "bank_name",
        "bank_number",
        "salary",
        "salary_basis",
        "payment_type",
        "gratuity",
        "salary_gross",
        "salary_net",
        "overtime",
        "deduction",
        "unpaid_leave",
        "advance",
        "absent_amount",
        "allowance",
        "loan",
        "insurance",
        "others",
        "user_id",
        "user_create",
        "user_update"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

}
