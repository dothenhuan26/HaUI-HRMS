<?php

namespace Modules\Payroll\Repositories\Eloquent;

use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Payroll\Models\SalaryRank;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;
use Modules\Payroll\Repositories\Contracts\SalaryRankRepositoryInterface;

class SalaryRankRepository extends BaseEloquentRepository implements SalaryRankRepositoryInterface
{

    public function model()
    {
        return SalaryRank::class;
    }



}
