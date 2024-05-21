<?php

namespace App\Http\Controllers;
use App\Models\Reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\Cart;
class homepageController extends Controller
{
    public function index($user_id=null)
    {
        $product=product::paginate(10);
        $user=Reg::find($user_id);
       // dd($user);
        return view('home.homepage', compact('product','user'));
    }
    public function login()
    {
        //return "hello";
        return view('login');
    }
    public function signup()
    {
        return view('registration');
    }
    public function cartshow($id=null)
    {
        $user=Reg::find($id);
        //dd($user->toarray());
        $cart_items= Cart::where('user_name', $user->name)->get();
       // dd($cart_items->toarray());
         return view('home.cart',compact('user', 'cart_items'));

    }
}
