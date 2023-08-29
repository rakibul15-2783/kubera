<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetails;
use App\Models\UserAddress;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegistration;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->email_verified_at)
            {
                if (Auth::attempt($credentials))
                {
                    if(auth()->user()->status != false)
                    {
                        return redirect()->route('dashboard');
                    }
                    elseif(auth()->user()->role == 1 && auth()->user()->user_verified == 0)
                    {
                        return redirect()->route('investor.profile');
                    }
                    elseif(auth()->user()->role == 2 && auth()->user()->user_verified == 0)
                    {
                        return redirect()->route('entrepreneur.profile');
                    }
                    elseif(auth()->user()->user_verified == 1)
                    {
                        return redirect()->route('dashboard');
                    }
                    else
                    {
                        return redirect()->route('user.role');
                    }
                }
                else
                {
                    return back()->withErrors(['password' => 'Invalid email or password']);
                }
            }
            else
            {
                return back()->withErrors(['email' => 'Email not verified']);
            }
        }

        return back()->withErrors(['email' => 'User not found']);
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function registerPost(UserRegistration $request){

        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        $userDetails = new UserDetails();
        $userDetails->user_id = $user->id;
        $userDetails->save();

        $userAddress = new UserAddress();
        $userAddress->user_id = $user->id;
        $userAddress->save();

        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please check your email for verification.');
    }

    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid verification token.');
        }

        $user->email_verified_at= now();
        $user->remember_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Email verified successfully.');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }


}
