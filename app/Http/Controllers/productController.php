<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use App\Models\product;
use App\Models\cart;
use App\Models\buy;
use App\Models\offers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
class productController extends Controller
{
    public function buy(Request $request, $user)
    {
        // Retrieve the user
        $user = Reg::find($user);
        $offer=offers::all();
        // Decode JSON strings into objects
        $cartItems = json_decode($request->input('cartItems'));
        $quantities = json_decode($request->input('quantities'), true);


        if (is_array($cartItems) && is_array($quantities)) {
            foreach ($cartItems as $cart_item) {
                $buyitems = new Buy;
                $buyitems->product_name = $cart_item->product_name;
                $buyitems->product_price = $quantities[$cart_item->id] * $cart_item->product_price;
                $buyitems->product_quantity = $quantities[$cart_item->id];
                $buyitems->image = $cart_item->image;
                $buyitems->user_id=$user->id;
                $buyitems->user_name = $user->name;
                $buyitems->user_email = $user->email;
                $buyitems->user_address = $user->cur_address;
                $buyitems->user_contact = $user->phone;
                $buyitems->save();
            }
        } else {
            return redirect()->back()->withErrors('Invalid cart items or quantities.');
        }

        // Retrieve products for pagination
        $product = Product::paginate(10);
        Alert::success('Product Order successfully','It will be delivered soon');
        // Redirect to the home page with a success message
        return view('home.homepage', compact('user', 'product','offer'))->withSuccess('Product is ordered');
    }

    // public function buySingle($id, $user)
    // {
    //     $item = Product::find($id);
    //     $user = Reg::find($user);

    //     // Check if the item is already bought by the user
    //     $existingBuyItem = Buy::where('product_name', $item->name)
    //         ->where('user_email', $user->email)
    //         ->first();

    //     if (!$existingBuyItem) {
    //         $buyitems = new Buy;
    //         $buyitems->product_name = $item['name'];
    //         $buyitems->product_price = $item['discount'] ?? $item['price'];
    //         $buyitems->image = $item['image'];
    //         $buyitems->product_quantity = 1;
    //         $buyitems->user_name = $user['name'];
    //         $buyitems->user_email = $user['email'];
    //         $buyitems->user_address = $user->cur_address;
    //         $buyitems->user_contact = $user->phone;
    //         $buyitems->save();
    //     }
    //     $product= Product::paginate(10);
    //     // Redirect to homepage to prevent duplicate insertion on page reload
    //     return view('home.homepage',compact('user','product'))->with('success', 'Product ordered successfully');
    // }

    public function buycarterror()
    {

        return view('login')->withSuccess('u must login first');
    }
    public function showproduct($id, $user = null)
    {
        $product = Product::find($id);

            $user = Reg::find($user);

                return view('home.details', compact('product', 'user'));
    }

    public function show_orders($user)
    {
        $ordered=Buy::find($user);
        return view('home.show_buy', compact('ordered','user'));
    }

    public function addcart($id, $user_id)
    {
        Log::info("addcart method called with product id: $id and user id: $user_id");
        $offer= offers::all();
        $item = Product::find($id);
        $user = Reg::find($user_id);
        $product = Product::paginate(10);
        // Check if the cart item already exists for this user and product
        $existingCartItem = Cart::where('product_name', $item->name)
                                ->where('user_email', $user->email)
                                ->first();
        if ($existingCartItem) {
            return view('home.homepage', compact('user','product','offer'))->with('info', 'Product is already in the cart.');
        }

        $cart_item = new Cart;
        $cart_item->product_name = $item['name'];
        $cart_item->product_price = $item['discount'] ?? $item['price'];
        $cart_item->image = $item['image'];
        $cart_item->user_id=$user->id;
        $cart_item->user_name = $user['name'];
        $cart_item->user_email = $user['email'];
        $cart_item->save();
        Alert::success('Product Added Successfully','We Have added product to the cart');
        $product = Product::paginate(10);
        return view('home.homepage', compact('product', 'user','offer'));
    }

    public function delete($id,$user_id)
    {
        $item=cart::find($id);
        $user= Reg:: find($user_id);
        if($item==null)
        return back()->withError("no data in database");
        else{
        $item->delete();
        $cart_items= Cart::where('user_id', $user->id)->get();
        return view('home.cart', compact('user','cart_items'));
      //  return back()->withSuccess("product deleted");
        }
    }
    public function show_order($user_id)
    {
        $user= Reg::find($user_id);
        $ordered= Buy::where('user_id',$user_id)->get();
        return view('home.show_buy',compact('user','ordered'));
    }
    public function cancle_order($id,$user_id)
    {
        $item=buy::find($id);
        if($item==null){
            Alert::error('no Product has been ordered');
        return back()->withError("no data in the buy table");
        }
        else
        {
            $item->delete();
            $user=reg::find($user_id);
            Alert::success('Order cancled successfully','The order has been cancled');
            return back();
        }
    }
    public function search_product(Request $req,$user_id=null)
    {
        $search= strtolower($req->input('search'));
            $user= Reg::find($user_id);
        //dd($search);
        //dd($user);
       $product = Product::where('name', 'like', '%' . $search. '%')->paginate(20);
       //dd($product->toarray());

       return view('home.productsonly', compact('product','user'));

    }
    public function products($user_id=null)
    {
        $product=product::paginate(20);
        $user= reg::find($user_id);
       return view('home.productsonly', compact('product','user'));
    }
}
