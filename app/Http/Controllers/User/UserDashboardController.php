<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
}
