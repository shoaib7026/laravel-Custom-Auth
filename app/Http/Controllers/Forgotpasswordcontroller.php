<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class Forgotpasswordcontroller extends Controller
{
  public function resetlink( Request $request){

$request->validate([
    'email'=>'required|email|exists:users,email',
]);

$status = Password::sendResetLink(

$request->only('email')

);

 if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }


  }
}   
