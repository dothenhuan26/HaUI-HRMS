<?php

namespace Modules\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Designation\Models\Designation;
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
        'password',
        'address',
        'gender',
        'birthday',
        'is_active',
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
        'job_id',
        'avatar_id',
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
    ];

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



}
