<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        }

        else{
            return view('sign_in')->with('error', "Invalid Credentials");
        }
    }
}