<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserAddress;
use App\Models\Project;
use App\Enums\UserRole;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalUser = User::where('user_verified', 1)->count();

    $investor = User::where('role', UserRole::Investor)
        ->where('user_verified', 1)
        ->count();

    $entrepreneur = User::where('role', UserRole::Entrepreneur)
        ->where('user_verified', 1)
        ->count();

    $requestUser = User::where('user_verification_request', 1)->count();
    $totalProject = Project::all()->count();

    return view('admin.dashboard', compact('totalUser', 'requestUser', 'totalProject', 'investor', 'entrepreneur'));
}

    public function newUser()
    {
        $users = User::where('user_verification_request', 1)->get();

        return view('admin.new-user-list',compact('users'));
    }

    public function users()
    {
        $users = User::where('user_verified', 1)->get();

        return view('admin.user-list',compact('users'));
    }

    public function userProfile($id)
    {
        $user = User::find($id);
        $userDetails = UserDetails::where('user_id',$id)->first();
        $userAddress = UserAddress::where('user_id',$id)->first();

        return view('admin.user-profile',compact('user','userDetails','userAddress'));
    }

    public function newUserProfile($id)
    {
        $user = User::find($id);
        $userDetails = UserDetails::where('user_id',$id)->first();
        $userAddress = UserAddress::where('user_id',$id)->first();

        return view('admin.new-user-profile',compact('user','userDetails','userAddress'));
    }

    public function userAccept($id)
    {
        $user = User::find($id);
        $user->user_verified = 1;
        $user->save();

        return redirect()->route('new.user.list');
    }

    public function searchUsers(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('email', 'LIKE', '%' . $search . '%')
            ->orWhere('name', 'LIKE', '%' . $search . '%')
            ->get();

        return view('admin.search-user', compact('users'));
    }

    public function point()
    {
        $users = User::where('role', 2)->get();

        return view('admin.points', compact('users'));
    }

    public function donatePoint(Request $request)
    {
        $userId = $request->user_id;
        $points = $request->points;
        $userDetails = UserDetails::where('user_id',$userId)->first();

        if($userDetails)
        {
            $userDetails->points = $userDetails->points + $points;
            $userDetails->save();

            return back();
        }

        return back();
    }



}
