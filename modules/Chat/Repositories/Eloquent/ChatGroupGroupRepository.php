<?php

namespace Modules\Chat\Repositories\Eloquent;


use Modules\Chat\Models\ChatGroup;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Chat\Repositories\Contracts\ChatGroupRepositoryInterface;

class ChatGroupGroupRepository extends BaseEloquentRepository implements ChatGroupRepositoryInterface
{

    public function model()
    {
        return ChatGroup::class;
    }

    public function generalGroup()
    {
        return $this->find(1);
    }


}
