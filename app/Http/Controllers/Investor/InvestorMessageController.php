<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestorMessageController extends Controller
{
    public function message()
    {
        return view('user.investor.message');
    }
}
