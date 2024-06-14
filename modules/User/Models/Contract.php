<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contract extends Model
{

    protected $table = "contracts";

    protected $fillable = [
        'content',
        'employee_id',
        'user_create',
        'user_update'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function getContentAttribute($value)
    {
        return decrypt($value);
    }

}
