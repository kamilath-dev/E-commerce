<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function admincheck(Request $request)
    {
     $credentials = $request->validate([
     'email' => ['required', 'email'],
     'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->intended('admin/dashboard');
        }
        else
        {
            session()->flash('error', 'Invalid Credentials');
            return redirect()->route('admin.login');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
