<?php

namespace App\Http\Controllers;
use App\Models\Reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
class homepageController extends Controller
{
    public function index()
    {
        $product=product::paginate(10);
      return view('home.homepage', compact('product'));
    }
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('registration');
    }
    public function cartshow($id=null)
    {
        $user=Reg::find($id);
        $cart_items= Cart::all();
        return view('home.cart',compact('user', 'cart_items'));
    }
}
