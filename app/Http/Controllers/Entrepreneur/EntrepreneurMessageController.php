<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class EntrepreneurMessageController extends Controller
{
    public function messages($projectId)
    {
        $messages = Message::where('project_id',$projectId)->get();

        return view('user.entrepreneur.project-based-message',compact('messages'));
    }

    public function message($messageId)
    {
        $messageid = $messageId;

        $conversations = Conversation::where('message_id',$messageId)->get();
        // dd($messageid);
        return view('user.entrepreneur.user-based-message',compact('conversations','messageid'));
    }

    public function messagePost(Request $request, $messageId)
    {
        $userId = auth()->user()->id;
        $message = Message::find($messageId)->first();

        // dd($messageId);
        $projectId = $message->project_id;

        $conversation = new Conversation();
        $conversation->user_id = $userId;
        $conversation->project_id = $projectId;
        $conversation->message_id = $messageId;
        $conversation->conversation = $request->message;
        // dd($conversation);
        $conversation->save();

        return back();
    }
}
