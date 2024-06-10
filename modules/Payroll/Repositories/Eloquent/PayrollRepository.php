<?php

namespace Modules\Payroll\Repositories\Eloquent;

use Modules\Payroll\Models\Payroll;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Payroll\Repositories\Contracts\PayrollRepositoryInterface;

class PayrollRepository extends BaseEloquentRepository implements PayrollRepositoryInterface
{

    public function model()
    {
        return Payroll::class;
    }



}
