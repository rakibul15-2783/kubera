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
    public function userProfileUpdate()
    {
        return view('user.profile-update');
    }

    public function userRole()
    {
        return view('user.select-role');
    }

    public function investor(Request $request, $id)
    {
        $role = UserRole::Investor;
        $user = User::find($id);

        $user->role = $role;
        $user->save();

        return redirect('user-profile-update');
    }

    public function entrepreneur(Request $request, $id)
    {
        $role = UserRole::Entrepreneur;
        $user = User::find($id);

        $user->role = $role;
        $user->save();

        return redirect('user-profile-update');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function profileUpdatePost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();

        $userInfo = new UserInfo();

        $userInfo->user_id = auth()->user()->id;
        $userInfo->contact_number = $request->contact_number;
        $userInfo->nid = $request->nid;
        $userInfo->birth_c = $request->birth_c;
        $userInfo->passport_no = $request->passport_no;
        $userInfo->save();

        $userAddress = new UserAddress();

        $userAddress->user_id = auth()->user()->id;
        $userAddress->country = $request->contact_number;
        $userAddress->address = $request->address;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();

        return back();
    }
}
