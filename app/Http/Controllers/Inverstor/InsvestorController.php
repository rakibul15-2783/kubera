<?php

namespace App\Http\Controllers\Inverstor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserAddress;
use App\Enums\UserRole;

class InsvestorController extends Controller
{
    public function profileUpdate()
    {
        return view('user.investor.investor-profile');
    }

    public function profileUpdatePost(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->user_verified_request = 1;
        $user->role = UserRole::Investor;
        $user->save();

        $userInfo = new UserInfo();

        if ($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $filePath = 'upload/profile/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $file->move('upload/profile/', $fileName);
            $userInfo->profile_image = $fileName;
            $userInfo->user_id = auth()->user()->id;
            $userInfo->contact_number = $request->contact_number;
            $userInfo->nid = $request->nid;
            $userInfo->birth_c = $request->birth_c;
            $userInfo->passport_no = $request->passport_no;
            $userInfo->bio = $request->bio;

            $userInfo->save();
        }
        else{
            $userInfo->user_id = auth()->user()->id;
            $userInfo->contact_number = $request->contact_number;
            $userInfo->nid = $request->nid;
            $userInfo->birth_c = $request->birth_c;
            $userInfo->passport_no = $request->passport_no;
            $userInfo->bio = $request->bio;
            $userInfo->save();
        }

        $userAddress = new UserAddress();

        $userAddress->user_id = auth()->user()->id;
        $userAddress->country = $request->country;
        $userAddress->address = $request->address;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();

        return back();
    }
}
