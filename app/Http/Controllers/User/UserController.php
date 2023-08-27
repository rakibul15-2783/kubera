<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserAddress;
use App\Enums\UserRole;

class UserController extends Controller
{
    public function userRole()
    {
        return view('user.select-role');
    }

    

    // public function investor(Request $request, $id)
    // {
    //     $role = UserRole::Investor;
    //     $user = User::find($id);

    //     $user->role = $role;
    //     $user->save();

    //     return redirect('user-profile-update');
    // }

    // public function entrepreneur(Request $request, $id)
    // {
    //     $role = UserRole::Entrepreneur;
    //     $user = User::find($id);

    //     $user->role = $role;
    //     $user->save();

    //     return redirect('user-profile-update');
    // }

    public function dashboard()
    {
        return view('user.dashboard');
    }




}
