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
        // dd($message);
        $conversations = Conversation::where('message_id',$messageId)->get();
        // dd($messageid);
        return view('user.entrepreneur.user-based-message',compact('conversations','message'));
    }

    public function messagePost(Request $request, $messageId)
    {
        $userId = auth()->user()->id;
        $message = Message::find($messageId);

        $subscription = Subscription::where('user_id', $userId)
            ->where('end_date', '>=', now())
            ->first();

        if ($subscription) {

            $existingConversations = Conversation::where('message_id', $messageId)
            ->where('user_id', $userId)
            ->get();

            if (auth()->user()->role == 2 && count($existingConversations) === 0) {

                $user = User::find($userId);

                if ($user->userDetails->points >= 5)
                {
                    $user->userDetails->decrement('points', 5);
                }
                else
                {
                    return back()->withErrors(['points' => 'Insufficient points']);
                }
            }

            $conversation = new Conversation();
            $conversation->user_id = $userId;
            $conversation->message_id = $messageId;
            $conversation->conversation = $request->message;
            $conversation->save();

            return back();
        } else {
            return back()->withErrors(['subscription' => 'Please subcribe to use the chat option. Here is the subsription page .']);
        }
    }

}
