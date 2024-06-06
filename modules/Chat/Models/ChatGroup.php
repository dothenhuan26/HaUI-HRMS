<?php

namespace Modules\Chat\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\User;

class ChatGroup extends Model
{
    use HasFactory;

    protected $table = "chat_groups";

    protected $fillable = [
        "name",
        "number_of_members",
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class, "group_id", "id");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "chat_groups_users", "group_id", "user_id");
    }



}
