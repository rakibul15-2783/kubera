<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
}
