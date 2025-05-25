<?php

use App\Http\Controllers\dashobard;
use App\Http\Controllers\Forgotpasswordcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',function(){
    return view('register');
});
Route::post('registeruser',[Usercontroller::class,'registeruser']);

// ye he dashobard ka route 
Route::get('dashboard',[dashobard::class,'index'])->name('dashboard')->middleware('auth');

// yaha se login ka route shoro he 
Route::get('login',function(){
    return view('login');
})->name('login');

Route::post('loginuser',[LoginController::class,'loginuser']);

// yaha se logout wala shoro he 

Route::get('logout',function(){
Auth::logout();
return redirect('login')->with('success','logout out Succesfully');


});

// yaha se forgotpassword wala route shoro he 

Route::get('forgotpassword',function(){
    return view('forgotpassword');
});

Route::post('forgotpassword',[Forgotpasswordcontroller::class,'resetlink']);


// Show Reset Password Form (with token)
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle Reset Password Submission
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
