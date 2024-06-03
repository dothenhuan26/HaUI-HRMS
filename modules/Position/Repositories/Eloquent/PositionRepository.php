<?php

namespace Modules\Position\Repositories\Eloquent;

use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Position\Models\Position;
use Modules\Position\Repositories\Contracts\PositionRepositoryInterface;

class PositionRepository extends BaseEloquentRepository implements PositionRepositoryInterface
{

    public function model()
    {
        return Position::class;
    }



}
