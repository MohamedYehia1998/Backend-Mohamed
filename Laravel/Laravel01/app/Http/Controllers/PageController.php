<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello()
    {
        return "Hello";
    }

    public function contact()
    {
        return "5428524";
    }
}
