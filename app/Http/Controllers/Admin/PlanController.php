<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function plan()
    {
        $plans = Plan::all();
        
        return view('admin.subscription',compact('plans'));
    }

    public function planPost(Request $request)
    {
        $plan = New Plan();

        $plan->plan_name = $request->plan_name;
        $plan->period = $request->period;
        $plan->price = $request->price;
        $plan->status = 1;
        $plan->save();

        return back();
    }
}
