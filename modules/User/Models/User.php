<?php

namespace Modules\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Chat\Models\ChatGroup;
use Modules\Chat\Models\Conversation;
use Modules\Designation\Models\Designation;
use Modules\Media\Models\MediaFile;
use Modules\OJT\Models\Ojt;
use Modules\Payroll\Models\Payroll;
use Modules\User\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'id_card',
        'code',
        'password',
        'address',
        'gender',
        'birthday',
        'status',
        'phone',
        'passport',
        'passport_exp',
        'national',
        'religion',
        'country',
        'user_create',
        'user_update',
        'role_id',
        'avatar_id',
        'designation_id',
        'experiences',
        'user_create',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        "experiences"       => "array",
        "educations"        => "array",
        "birthday"          => "datetime:m/d/Y",
        "passport_exp"      => "datetime:m/d/Y",
    ];

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = date('Y-m-d', strtotime($value));
    }

    public function getBirthdayAttribute($value)
    {
        return date('m/d/Y', strtotime($value));
    }

    public function setPassportExpAttribute($value)
    {
        $this->attributes['passport_exp'] = date('Y-m-d', strtotime($value));
    }

    public function fillByAttr($attributes, $input)
    {
        if (!empty($attributes)) {
            foreach ($attributes as $item) {
                $this->$item = isset($input[$item]) ? ($input[$item]) : null;
            }
        }
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, "designation_id", "id");
    }

    public function isSuperAdmin()
    {
        return $this->hasRole("super_admin");
    }

    public function avatar()
    {
        return $this->belongsTo(MediaFile::class, "avatar_id", "id");
    }

    public function payroll()
    {
        return $this->hasOne(Payroll::class, "user_id", "id");
    }

    public function chatGroups()
    {
        return $this->belongsToMany(ChatGroup::class, "chat_groups_users", "group_id", "user_id");
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, "user_id", "id");
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'employee_id', 'id');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, "user_create", "id");
    }

    public function ojts()
    {
        return $this->belongsToMany(Ojt::class, "ojts_users", "user_id", "ojt_id");
    }

}
