<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function logout()
    {
        return view('home.homepage');
    }
}
