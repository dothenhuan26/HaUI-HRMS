<?php

namespace Modules\User\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{

    public function model()
    {
        return User::class;
    }

    public function exceptRole($role)
    {

    }

    public function exceptRoles($roles = [])
    {

    }

    public function exceptSuperAdmin()
    {
        $this->model = $this->model->where('id', '!=', Auth::id());
        return $this;
    }


}
