<?php

namespace Modules\User\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Modules\User\Models\Role;
use function Ramsey\Collection\Map\get;


trait HasRoles
{
    public function hasPermission($permission = "")
    {
        if (!$this->role or !$this->role->hasPermission($permission)) return false;
        return true;
    }

    public function assignRole($through)
    {
        if ($through instanceof Role) {
            $this->role_id = $through->id;
            $this->save();
            return;
        }
        $role = Role::find((int)$through);
        if (empty($role))
            $role = Role::query()->where('code', $through)->first();
        if (empty($role))
            $role = Role::query()->where('name', $through)->first();
        if ($role) {
            $this->role_id = $role->id;
            $this->save();
        }
    }

    protected function roleName()
    {
        return Attribute::make(get:function ()
    {
        return $this->role->name ?? '';
    }
        );
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function hasRole($through)
    {
        if ($through instanceof Role) {
            return $this->role_id == $through->id;
        }
        if (is_integer($through))
            return $this->role_id == $through;
        $role = Role::query()->where('code', $through)->first();
        if (empty($role))
            $role = Role::query()->where('name', $through)->first();
        return $this->role_id == $role->id;
    }


}
