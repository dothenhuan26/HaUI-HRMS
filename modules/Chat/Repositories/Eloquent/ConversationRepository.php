<?php

namespace Modules\Chat\Repositories\Eloquent;


use Modules\Chat\Models\Conversation;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Chat\Repositories\Contracts\ChatGroupRepositoryInterface;

class ConversationRepository extends BaseEloquentRepository implements ChatGroupRepositoryInterface
{

    public function model()
    {
        return Conversation::class;
    }


}
