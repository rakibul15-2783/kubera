<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminPasswordChange;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            $admin = Auth::guard('admin')->user();

            if ($admin->status == 1)
            {
                return redirect()->route('admin.dashboard');
            }
            else
            {
                Auth::guard('admin')->logout();
                return back()->withInput()->withErrors(['email' => 'Admin is inactive']);
            }
        }
        return back()->withInput()->withErrors(['email' => 'Invalid Email or Password']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function changePasswordPost(AdminPasswordChange $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $old_password = $request->input('old_password');
        $new_password = $request->input('password');
        $confirm_password = $request->input('password_confirmation');

        if ($admin) {
            if (!Hash::check($old_password, $admin->password)) {
                return back()->with('error', 'Old password is incorrect.');
            }
            elseif ($new_password !== $confirm_password) {
                return back()->with('newPassError', 'Password confirmation does not match.');
            }
             else {
                // Update the admin's password with the new hashed password
                $admin->password = Hash::make($new_password);
                $admin->save();

                return back()->with('success', 'Password Changed Successfully');
            }
        }


    }
}
