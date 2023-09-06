<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Subscription;
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
        $message = Message::where('id', $messageId)->first();
        $userId = auth()->user()->id;

        $conversations = Conversation::where('message_id',$messageId)->get();

        $subscription = Subscription::where('user_id', $userId)
            ->where('end_date', '>=', now())
            ->first();

        $existingConversations = Conversation::where('message_id', $messageId)
            ->where('user_id', $userId)
            ->count();
        $user = User::find($userId);
        $points = $user->userDetails->points;
        // dd($points);
        // dd($existingConversations);
        return view('user.entrepreneur.user-based-message',compact('conversations','message','subscription','existingConversations','points'));
    }

    public function messagePost(Request $request, $messageId)
    {
        $userId = auth()->user()->id;
        $message = Message::find($messageId);

        $existingConversationCount = Conversation::where('message_id', $messageId)
            ->where('user_id', $userId)
            ->count();

        if ($existingConversationCount === 0) {

            $user = User::find($userId);

            $user->userDetails->decrement('points', 5);

            $conversation = new Conversation();
            $conversation->user_id = $userId;
            $conversation->message_id = $messageId;
            $conversation->conversation = $request->message;
            $conversation->save();
            return back();

        }

        $conversation = new Conversation();
        $conversation->user_id = $userId;
        $conversation->message_id = $messageId;
        $conversation->conversation = $request->message;
        $conversation->save();

        return back();
    }

}
