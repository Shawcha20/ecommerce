<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\Cart;
use App\Models\Buy;
use App\Models\Reg;
use App\Models\Product;

class StripePaymentController extends Controller
{
    public function stripe(Request $request)
    {
        // Decode JSON strings to arrays
        $selectedItems = json_decode($request->selected_items, true);
        $quantities = json_decode($request->quantities, true);
        return view('home.stripe', compact('selectedItems', 'quantities'));
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Stripe\Charge::create([
            "amount" => 100 * 100, // You should calculate the total amount based on cart items
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $selectedItems = json_decode($request->selected_items, true);
        $quantities = json_decode($request->quantities, true);

        // Retrieve user details and save the order
        $user = auth()->user(); // Assuming you use authentication

        foreach ($selectedItems as $itemId) {
            $cartItem = Cart::find($itemId);
            if ($cartItem) {
                $buyItem = new Buy;
                $buyItem->product_name = $cartItem->product_name;
                $buyItem->product_price = $quantities[$itemId] * $cartItem->product_price;
                $buyItem->product_quantity = $quantities[$itemId];
                $buyItem->image = $cartItem->image;
                $buyItem->user_name = $user->name;
                $buyItem->user_email = $user->email;
                $buyItem->user_address = $user->cur_address;
                $buyItem->user_contact = $user->phone;
                $buyItem->save();
            }
        }

        // Redirect to home page with success message
        $product = Product::paginate(10);
        return view('home.homepage', compact('user', 'product'))->withSuccess('Product is ordered');
    }
}
