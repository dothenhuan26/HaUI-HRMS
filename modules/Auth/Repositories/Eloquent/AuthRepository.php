<?php

namespace Modules\Auth\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Auth\Repositories\Contracts\AuthRepositoryInterface;

class AuthRepository extends BaseEloquentRepository implements AuthRepositoryInterface
{

    public function model()
    {
        return Auth::class;
    }



}
