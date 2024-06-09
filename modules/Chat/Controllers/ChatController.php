<?php

namespace Modules\Chat\Controllers;

use App\Events\PublicMessageSent;
use Illuminate\Support\Arr;
use Modules\Chat\Models\Conversation;
use Modules\Chat\Repositories\Contracts\ChatGroupRepositoryInterface;
use Modules\Chat\Repositories\Contracts\ConversationRepositoryInterface;
use Modules\Core\Admin\AdminController;
use Illuminate\Http\Request;

class ChatController extends AdminController
{
    protected $chatGroupRepository;
    protected $conversationRepository;

    public function __construct(ChatGroupRepositoryInterface    $chatGroupRepository,
                                ConversationRepositoryInterface $conversationRepository)
    {
        $this->chatGroupRepository = $chatGroupRepository;
        $this->conversationRepository = $conversationRepository;
    }

    public function indexDemo()
    {
        $data = [
            "page_title" => __("Public Group"),
        ];
        return view("Chat::frontend.index", $data);
    }

    public function messageReceivedDemo(Request $request)
    {
        $rules = [
            "message" => "required",
        ];
        $request->validate($rules);

        broadcast(new PublicMessageSent($request->user(), $request->message));
        return response()->json("Message Broadcast");
    }

    public function index(Request $request)
    {

        $generalGroup = $this->chatGroupRepository->generalGroup();
        $conversations = $generalGroup->conversations;

        $data = [
            "conversations" => $conversations,
        ];

        return view("Chat::frontend.public.index", $data);
    }

    public function getConversations()
    {
        $data = [];
        $generalGroup = $this->chatGroupRepository->generalGroup();
        $conversations = $generalGroup->conversations;
        foreach ($conversations as $conversation) {
            $data[] = [
                "id"      => $conversation->id,
                "message" => $conversation->message,
                "user"    => [
                    "id"     => $conversation->user->id,
                    "name"   => $conversation->user->name,
                    "avatar" => $conversation->user->avatar?->url ?? asset("assets/img/user.jpg")
                ],
            ];
        }
        return response()->json($data);
    }

    public function send(Request $request)
    {
        $rules = [
            "message" => "required",
        ];
        $request->validate($rules);

        broadcast(new PublicMessageSent($request->user(), $request->message));
        $this->conversationRepository->saveGeneralConversation($request->user(), $request->message);
        return response()->json("Message Broadcast");
    }

}

