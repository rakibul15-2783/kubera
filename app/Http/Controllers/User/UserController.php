<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userProfileUpdate()
    {
        return view('user.profile-update');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
