<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EntrepreneurProfileValidation;
use Illuminate\Http\Request;
use App\Enums\UserRole;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserAddress;

class EntrepreneurController extends Controller
{
    public function profileUpdate()
    {
        return view('user.entrepreneur.entrepreneur-profile');
    }

    public function profileUpdatePost(EntrepreneurProfileValidation $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->user_verification_request = 1;
        $user->role = UserRole::Entrepreneur;
        $user->save();

        $userDetails = UserDetails::where('user_id',$id)->first();

        if ($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $filePath = 'upload/profile/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $file->move('upload/profile/', $fileName);
            $userDetails->profile_image = $fileName;
            $userDetails->user_id = auth()->user()->id;
            $userDetails->phone = $request->phone;
            $userDetails->nid = $request->nid;
            $userDetails->birth_c = $request->birth_c;
            $userDetails->passport_no = $request->passport_no;
            $userDetails->bio = $request->bio;

            $userDetails->save();
        }
        else{
            $userDetails->user_id = auth()->user()->id;
            $userDetails->phone = $request->phone;
            $userDetails->nid = $request->nid;
            $userDetails->birth_c = $request->birth_c;
            $userDetails->passport_no = $request->passport_no;
            $userDetails->bio = $request->bio;
            $userDetails->save();
        }

        $userAddress = UserAddress::where('user_id',$id)->first();

        $userAddress->user_id = auth()->user()->id;
        $userAddress->country = $request->country;
        $userAddress->address = $request->address;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();

        return redirect()->route('entrepreneur.profile');
    }

    public function profile(){
        $user = auth()->user()->id;
        $userDetails = UserDetails::where('user_id',$user)->first();
        $userAddress = UserAddress::where('user_id',$user)->first();

        return view('user.entrepreneur.profile-view',compact('user','userDetails','userAddress'));
    }
}
