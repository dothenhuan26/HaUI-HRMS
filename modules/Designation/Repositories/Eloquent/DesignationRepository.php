<?php

namespace Modules\Designation\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Designation\Repositories\Contracts\DesignationRepositoryInterface;

class DesignationRepository extends BaseEloquentRepository implements DesignationRepositoryInterface
{

    public function model()
    {
        return Designation::class;
    }



}
