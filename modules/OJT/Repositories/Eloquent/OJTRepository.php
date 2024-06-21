<?php

namespace Modules\OJT\Repositories\Eloquent;


use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\OJT\Models\Ojt;
use Modules\OJT\Repositories\Contracts\OJTRepositoryInterface;

class OJTRepository extends BaseEloquentRepository implements OJTRepositoryInterface
{

    public function model()
    {
        return Ojt::class;
    }

    public function syncOjtForUser(array $ids, $id)
    {
        $model = $this->find($id);
        $result = $model->users()->sync($ids);
        $this->resetModel();
        return $result;
    }


}
