<?php

namespace Modules\User\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\User\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{

    public function model()
    {
        return User::class;
    }



}
