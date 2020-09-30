<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            
            'email' => array(
                'required',
                'regex:/^[a-zA-Z][a-zA-z0-9]{0,}@(gmail|yahoo|ymail|hotmail).com$/',
                'unique:users',
            ),

            'password' => ['required','regex:/^.{6,}$/'],
        ]);

        $user = new User();
        $user->name = $request->firstname . " " . $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        // back() would make you stay in the same view and we did not account for this to display the alert box
        return redirect()->route('login')->with('status', 'Profile created successfully!');  
    }
}
