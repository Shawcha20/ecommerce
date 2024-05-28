<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\Buy;
use App\Models\Reg;
use App\Models\Product;
use App\Models\Offers;
use RealRashid\SweetAlert\Facades\Alert;
class StripePaymentController extends Controller
{
    public function stripePost(Request $request, $user)
    {


        $user=Reg::find($user);
         $selectedItemIds = $request->input('selected_items');
         $quantities = $request->input('quantities');
        // dd($selectedItemIds);
         //dd($quantities);
        $cartItems = Cart::whereIn('id', $selectedItemIds)->get();
        //dd($cartItems->toarray());
        $price=0;
        foreach($cartItems as $cart_item){
        $price=$quantities[$cart_item->id]*$cart_item->product_price+$price;
        }
       // dd($price);
        //dd($cartItems->toarray());
       
       return view('home.stripe',compact('user','price','cartItems','quantities'));
    }

//     public function singlebuy($id, $user)
//     {
//         $item = Product::find($id);
//         $user = Reg::find($user);
//         $price=$item['discount'] ?? $item['price'];
//        // dd($price);
//         return view('home.stripe',compact('user','price',''))
//    }
    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     $charge = Stripe\Charge::create([
    //         "amount" => 100 * 100, // You should calculate the total amount based on cart items
    //         "currency" => "usd",
    //         "source" => $request->stripeToken,
    //         "description" => "Test payment from itsolutionstuff.com."
    //     ]);

    //     $selectedItems = json_decode($request->selected_items, true);
    //     $quantities = json_decode($request->quantities, true);

    //     // Retrieve user details and save the order
    //     $user = auth()->user(); // Assuming you use authentication

    //     foreach ($selectedItems as $itemId) {
    //         $cartItem = Cart::find($itemId);
    //         if ($cartItem) {
    //             $buyItem = new Buy;
    //             $buyItem->product_name = $cartItem->product_name;
    //             $buyItem->product_price = $quantities[$itemId] * $cartItem->product_price;
    //             $buyItem->product_quantity = $quantities[$itemId];
    //             $buyItem->image = $cartItem->image;
    //             $buyItem->user_name = $user->name;
    //             $buyItem->user_email = $user->email;
    //             $buyItem->user_address = $user->cur_address;
    //             $buyItem->user_contact = $user->phone;
    //             $buyItem->save();
    //         }
    //     }

    //     // Redirect to home page with success message
    //     $product = Product::paginate(10);
    //     return view('home.homepage', compact('user', 'product'))->withSuccess('Product is ordered');
    // }
}
