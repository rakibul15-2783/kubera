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
        $messages = Message::findOrFail($projectId)->get();

        return view('user.entrepreneur.project-based-messages',compact('messages'));
    }

    public function message($messageId)
    {
        $conversations = Conversation::findOrFail($messageId)->get();
        $messageId = Message::findOrFail($messageId)->first();
        return view('user.entrepreneur.message',compact('conversations','messageId'));
    }

    public function messagePost(Request $request, $messageId)
    {
        $userId = auth()->user()->id;
        $message = Message::find($messageId)->first();
        $projectId = $message->project_id;

        $conversation = new Conversation();
        $conversation->user_id = $userId;
        $conversation->project_id = $projectId;
        $conversation->message_id = $message->id;
        $conversation->conversation = $request->message;
        // dd($conversation);
        $conversation->save();

        return back();
    }
}
