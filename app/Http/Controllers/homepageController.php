<?php

namespace App\Http\Controllers;
use App\Models\Reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class homepageController extends Controller
{
    public function index()
    {
      return view('home.homepage');
    }
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('registration');
    }
}
