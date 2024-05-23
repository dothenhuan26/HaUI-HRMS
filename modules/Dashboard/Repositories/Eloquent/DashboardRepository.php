<?php

namespace Modules\Dashboard\Repositories\Eloquent;

use App\Models\User;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Dashboard\Repositories\Contracts\DashboardRepositoryInterface;

class DashboardRepository extends BaseEloquentRepository implements DashboardRepositoryInterface
{

    public function model()
    {
        return Dashboard::class;
    }



}
