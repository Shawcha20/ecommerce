<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function buycart($id)
    {
        dd($id);
    }
    public function buycarterror()
    {
      
        return view('login')->withSuccess('u must login first');
    }
}
