<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Message;
use App\Models\Conversation;

class InvestorMessageController extends Controller
{
    public function message($projectId)
    {
        $userId = auth()->user()->id;

        $project = Project::find($projectId);

        $message = Message::where('project_id', $projectId)
            ->where('user_id', $userId)
            ->first();

        $conversations = null;

        if($message)
        {
            $conversations = Conversation::where('message_id', $message->id)->get();
        }


        return view('user.investor.message',compact('project','message','conversations'));

    }

    public function messagePost(Request $request, $projectId)
    {
        $userId = auth()->user()->id;

        $message = Message::where('user_id', $userId)
            ->where('project_id', $projectId)
            ->first();


        if ($message == null) {
            $message = new Message();
            $message->project_id = $projectId;
            $message->user_id = $userId;
            $message->save();
        }

        $conversation = new Conversation();
        $conversation->user_id = $userId;
        $conversation->message_id = $message->id;
        $conversation->conversation = $request->message;
        // dd($conversation);
        $conversation->save();

        return back();
    }

}
