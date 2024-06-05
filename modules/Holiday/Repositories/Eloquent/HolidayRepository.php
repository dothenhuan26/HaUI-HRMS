<?php

namespace Modules\Holiday\Repositories\Eloquent;

use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Holiday\Models\Holiday;
use Modules\Holiday\Repositories\Contracts\HolidayRepositoryInterface;

class HolidayRepository extends BaseEloquentRepository implements HolidayRepositoryInterface
{

    public function model()
    {
        return Holiday::class;
    }



}
