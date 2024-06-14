<?php

namespace Modules\User\Repositories\Eloquent;

use Modules\User\Models\Contract;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\User\Repositories\Contracts\ContractRepositoryInterface;

class ContractRepository extends BaseEloquentRepository implements ContractRepositoryInterface
{

    public function model()
    {
        return Contract::class;
    }

}
