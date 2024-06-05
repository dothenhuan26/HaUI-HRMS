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

    public function create(array $attributes = [])
    {
        if ($attributes['title']) {
            $attributes['slug'] = $this->model->genSlug($attributes['title']);
        }
        $result = $this->model->create($attributes);
        $this->resetModel();
        return $result;
    }

    public function update(array $attributes, $id)
    {
        if ($attributes['title']) {
            $attributes['slug'] = $this->model->genSlug($attributes['title']);
        }
        $model = $this->find($id);
        $result = $model->update($attributes);
        $this->resetModel();
        return $result;
    }


}
