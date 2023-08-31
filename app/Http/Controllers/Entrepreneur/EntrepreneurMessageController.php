<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntrepreneurMessageController extends Controller
{
    public function message()
    {
        return view('user.entrepreneur.message');
    }
}
