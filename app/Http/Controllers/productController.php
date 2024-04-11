<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use App\Models\product;
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
    public function showproduct($id, $user = null)
    {
        $product = Product::find($id);
        if ($user !== null) {
            $user = Reg::find($user);
            if ($user !== null) {
                return view('home.details', compact('product', 'user'));
            }
        }

        return view('home.details', compact('product'));
    }

}
