<?php

namespace App\Http\Controllers\User;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }


    public function check(Request $request)
    {
     $credentials = $request->validate([
     'email' => ['required', 'email'],
     'password' => ['required'],
        ]);

        // dd($credentials);

        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            return redirect()->intended('user/dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'User credentials are incorrect']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }
}
