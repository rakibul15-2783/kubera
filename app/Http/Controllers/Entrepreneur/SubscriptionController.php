<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function subscription()
    {
        $userId = auth()->user()->id;
        $subscription = null;
        $subscription = Subscription::where('user_id',$userId)->first();

        $plans = Plan::all();

        return view('user.entrepreneur.subscription',compact('subscription','plans'));
    }

    public function purchaseSubscription(Request $request, $userId)
    {

        $planId = $request->plan_id;
        $subscription = Subscription::where('user_id', $userId)->first();

        if($subscription)
        {
            $subscription->user_id = auth()->user()->id;
            $subscription->plan_id = $request->plan_id;
            $subscription->start_date = Carbon::now();
            $subscription->end_date = Carbon::now()->addMonth($planId);
            $subscription->save();
            return back();
        }

        $subscription = new Subscription();
        $subscription->user_id = auth()->user()->id;
        $subscription->plan_id = $request->plan_id;
        $subscription->start_date = Carbon::now();
        $subscription->end_date = Carbon::now()->addMonth($planId);
        $subscription->save();

        return back();
    }
}
