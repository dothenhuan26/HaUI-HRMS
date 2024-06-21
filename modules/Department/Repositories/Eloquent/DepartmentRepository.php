<?php

namespace Modules\Department\Repositories\Eloquent;

use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Department\Models\Department;
use Modules\Department\Repositories\Contracts\DepartmentRepositoryInterface;

class DepartmentRepository extends BaseEloquentRepository implements DepartmentRepositoryInterface
{

    public function model()
    {
        return Department::class;
    }

}
