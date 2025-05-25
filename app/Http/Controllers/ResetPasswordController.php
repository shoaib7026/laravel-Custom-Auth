<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

    
    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'Your password has been successfully reset. Please login.')
        : back()->withErrors(['email' => [__($status)]]);
    }
}
