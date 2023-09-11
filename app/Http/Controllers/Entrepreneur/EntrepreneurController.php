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

        // Update basic user information
        $user->name = $request->name;
        $user->user_verification_request = 1;
        $user->role = UserRole::Entrepreneur;
        $user->save();

        // Find or create user details
        $userDetails = UserDetails::firstOrNew(['user_id' => $user->id]);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $filePath = 'upload/profile/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $file->move('upload/profile/', $fileName);
            $userDetails->profile_image = $fileName;
        }

        // Update user details
        $userDetails->user_id = $user->id;
        $userDetails->phone = $request->phone;
        $userDetails->nid = $request->nid;
        $userDetails->birth_c = $request->birth_c;
        $userDetails->passport_no = $request->passport_no;
        $userDetails->bio = $request->bio;
        $userDetails->save();

        // Find or create user address
        $userAddress = UserAddress::firstOrNew(['user_id' => $user->id]);

        // Update user address
        $userAddress->user_id = $user->id;
        $userAddress->country = $request->country;
        $userAddress->address = $request->address;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();

        return redirect()->route('entrepreneur.profile');
    }

    public function profileEdit()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        return view('user.entrepreneur.update-profile', compact('user'));
    }

    public function profileEditPost(EntrepreneurProfileValidation $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->save();
        // Find or create user details
        $userDetails = UserDetails::where('user_id', $user->id)->first();

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $filePath = 'upload/profile/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $file->move('upload/profile/', $fileName);
            $userDetails->profile_image = $fileName;
        }

        // Update user details
        $userDetails->user_id = $user->id;
        $userDetails->phone = $request->phone;
        $userDetails->nid = $request->nid;
        $userDetails->birth_c = $request->birth_c;
        $userDetails->passport_no = $request->passport_no;
        $userDetails->bio = $request->bio;
        $userDetails->save();

        // Find or create user address
        $userAddress = UserAddress::where('user_id', $user->id)->first();

        // Update user address
        $userAddress->user_id = $user->id;
        $userAddress->country = $request->country;
        $userAddress->address = $request->address;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->save();

        return redirect()->route('entrepreneur.profile');
    }


    public function profile(){
        $userId = auth()->user()->id;

        $user = User::findOrFail($userId)->first();

        $userDetails = UserDetails::where('user_id',$userId)->first();
        $userAddress = UserAddress::where('user_id',$userId)->first();

        if($userDetails && $userAddress)
        {
            return view('user.entrepreneur.profile-view',compact('user','userDetails','userAddress'));
        }

        return back();

    }
}
