<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function registeruser(Request $request){

        $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|min:6|confirmed',

        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),

        ]);

         Auth::login($user);

return redirect()->route('dashboard')->with('success', 'Registration successful!');

    }
}
