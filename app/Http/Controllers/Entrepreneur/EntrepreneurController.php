<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserAddress;

class EntrepreneurController extends Controller
{
    public function entrepreneurProfileUpdate()
    {
        return view('user.entrepreneur-profile');
    }
    
    public function entrepreneurProfileUpdatePost(Request $request, $id)
    {
        $user = User::find($id);

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
