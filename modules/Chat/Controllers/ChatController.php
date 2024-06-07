<?php

namespace Modules\Chat\Controllers;

use App\Events\PublicMessageSent;
use Modules\Core\Admin\AdminController;
use Illuminate\Http\Request;

class ChatController extends AdminController
{
    public function indexDemo()
    {
        $data = [
            "page_title"  => __("Public Group"),
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

    public function index()
    {
        
    }

}

