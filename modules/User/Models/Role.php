<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{

    protected $table = "core_roles";

    protected $fillable = [
        'code',
        'name',
    ];

    protected $casts = [
        "created_at" => "datetime:m/d/Y",
    ];

    public function hasPermission($permission)
    {
        return RolePermission::query()->where([
            'role_id' => $this->id,
            'permission' => $permission
        ])->count(['id']);
    }

    public static function find($through)
    {
        if (is_integer($through)) {
            return parent::query()->where('id', $through)->first();
        }
        if (is_string($through)) {
            return parent::query()->where('code', $through)->first();
        }
    }

    public function assignPermission($permissions = [])
    {
        if (is_string($permissions)) $permissions = [$permissions];
        foreach ($permissions as $item) {
            RolePermission::firstOrCreate([
                'role_id' => $this->id,
                'permission' => $item
            ]);
        }
    }

    public function syncPermissions($permissions = [])
    {
        if (is_string($permissions)) $permissions = [$permissions];

        $ids = [];
        foreach ($permissions as $item) {
            $id = RolePermission::firstOrCreate([
                'role_id' => $this->id,
                'permission' => $item
            ]);

            $ids[] = $id->id;
        }

        RolePermission::query()->where('role_id', $this->id)->whereNotIn('id', $ids)->delete();
    }

    public function permissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }

    public static function findOrCreate($name)
    {
        return parent::firstOrCreate(['name' => $name, 'code' => Str::slug($name, '_')]);
    }

    public static function findByName($name)
    {
        return parent::query()->where('name', $name)->first();
    }

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

}
