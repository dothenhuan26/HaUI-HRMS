<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class Conversation extends Model
{
    use HasFactory;

    protected $table = "conversations";

    protected $fillable = [
        "message",
        "user_id",
        "group_id",
    ];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
