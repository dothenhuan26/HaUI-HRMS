<?php

namespace Modules\Chat\Repositories\Eloquent;


use Modules\Chat\Models\Conversation;
use Modules\Chat\Repositories\Contracts\ConversationRepositoryInterface;
use Modules\Core\Repositories\BaseEloquentRepository;
use Modules\Chat\Repositories\Contracts\ChatGroupRepositoryInterface;

class ConversationRepository extends BaseEloquentRepository implements ConversationRepositoryInterface
{

    public function model()
    {
        return Conversation::class;
    }

    public function getMessageFromGroup($id)
    {

    }

    public function saveGeneralConversation($user, $message)
    {
        return $this->create([
            "message"  => $message,
            "user_id"  => $user->id,
            "group_id" => 1,
        ]);
    }

}
