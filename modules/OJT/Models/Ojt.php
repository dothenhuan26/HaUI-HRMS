<?php

namespace Modules\OJT\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;


class Ojt extends Model
{
    use HasFactory;

    protected $table = "ojts";

    protected $fillable = [
        "title",
        "description",
        "stages",
        "user_create",
        "user_update",
    ];

    protected $casts = [
        "stages"       => "array",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, "ojts_users", "ojt_id", "user_id");
    }


}
