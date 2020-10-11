<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.after_authentication.profile.index');
    }


    public function store(Request $request)
    {
        $image = $request->file('image');
        $directory = 'uploads/' . strval(Auth::user()->id . '_' . str_replace(' ', '', Auth::user()->name)) . '/image';
        $image_name = strval(time()) . '.jpg';


        $image->move($directory, $image_name);

        $path = $directory . '/' . $image_name;
        Auth::user()->image = $path;

        Auth::user()->save();

        return redirect()->back();

    }


    public function delete()
    {

        Auth::user()->image = 'images/no_pic.jpg';

        Auth::user()->save();

        return redirect()->back();
    }
}

