<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade for password hashing

class UserRegistationController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    
    public function store(Request $request)
    {
       $input = $request->all();
       User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password'])

      ]);
       return view('user.thank');
    }
}
