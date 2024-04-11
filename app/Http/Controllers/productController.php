<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use App\Models\product;
use App\Models\cart;
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
    public function addcart($id, $user_id)
    {
        $item=Product::find($id);
        $user=Reg::find($user_id);
        $cart_item= new cart;
        $cart_item->product_name=$item['name'];
        $cart_item->product_price=$item['price'];
        $cart_item->user_name=$user['name'];
        $cart_item->user_email=$user['email'];
        $cart_item->save();
        $product=product::paginate(10);
        return view('home.homepage', compact('product','user'))->withSuccess('Product added to cart');
    }
}
