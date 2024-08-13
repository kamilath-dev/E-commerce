<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRegistationController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    
    public function store(Request $request)
    {
       $input = $request->all();
       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'role' => 'admin'

      ]);
       return view('admin.thank');
    }
}
