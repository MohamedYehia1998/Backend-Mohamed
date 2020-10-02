<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    
    #page where user enters their email address first
    public function loadEmailPage(){
        return view('pages.before_authentication.password_reset.forgot-password');
    }

    #send reset link to user
    public function sendLink(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function loadnewPasswordPage($token){
        return view('pages.before_authentication.password_reset.reset-password', ['token' => $token]);
    }

    public function updatePassword(Request $request){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
                event(new PasswordReset($user));
            }
        );
    
        return $status == Password::PASSWORD_RESET
        // put the variable "status" in the session -> extract in view
                    ? redirect()->route('login')->with('status', __($status))  
         //else stay at the same view           
                    : back()->withErrors(['email' => __($status)]);    
    }


}
