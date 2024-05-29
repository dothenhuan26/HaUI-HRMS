<?php

namespace Modules\Position\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Position\Repositories\Contracts\PositionRepositoryInterface;

class PositionRepository extends BaseEloquentRepository implements PositionRepositoryInterface
{

    public function model()
    {
        return Position::class;
    }



}
