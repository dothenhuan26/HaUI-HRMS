<?php

namespace Modules\User\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\User\Repositories\Contracts\RoleRepositoryInterface;

class RoleRepository extends BaseEloquentRepository implements RoleRepositoryInterface
{

    public function model()
    {
        return Role::class;
    }

}
