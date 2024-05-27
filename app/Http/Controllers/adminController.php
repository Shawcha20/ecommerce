<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Reg;
use App\Models\Buy;
use App\Models\Offers;
use RealRashid\SweetAlert\Facades\Alert;
class adminController extends Controller
{
    public function order($id)
    {
        $user=Reg::find($id);
        $orders= Buy::all();
        return view('admin.adminorder',compact('user','orders'));
    }
    public function add($id)
    {
         $user=Reg::where('name',$id)->first();
         return view('admin.adminproduct',compact('user'));
    }
    public function addData(Request $req, $id)
    {
        // Validate the incoming request data
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
            'dis_price' => 'nullable|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'catagory' => 'required|string|max:255',
        ]);
        $user = Reg::where('name', $id)->first();

        if (!$user) {
            return back()->withErrors('User not found.');
        }

        $imageName = time() . '.' . $req->image->extension();
        $req->image->move(public_path('products'), $imageName);


        $product = new Product;
        $product->name = strtolower($validatedData['name']);
        $product->details = $validatedData['details'];
        $product->price = $validatedData['price'];
        $product->discount = $validatedData['dis_price'] ?? 0;
        $product->image = $imageName;
        $product->catagory = $validatedData['catagory'];
        $product->save();

        return back()->withSuccess('Product added successfully.');
    }

    public function show($id)
    {
         $user=Reg::where('name',$id)->first();
         $product= product::all();
        return view('admin.show',compact('user','product'));
    }
    public function update($id,$id1)
    {
        $user=Reg::where('name',$id1)->first();
        $item= product::find($id);
        // dd($user->toarray());
       // dd($item->toarray());
        return view('admin.update',compact('item','user'));
    }
    public function updatedata(Request $req,$id)
    {
        $req->validate(
            [
                'name'=>'required',
                'details'=>'required',
                'price'=>'nullable',
                'dis_price'=>'nullable',
                'catagory'=>'nullable',
                'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:1000 '
            ]
            );

        $item=product::find($id);
        $item->name=$req->name;
        $item->details=$req['details'];
        if($req->price)
        {
            $item->price=$req->price;
        }
        if($req->dis_price)
        {
            $item->discount=$req['dis_price'];
        }
        if($req->image!=null)
        {
            $imagename=time().'.'.$req->image->extension();
            $req->image->move(public_path('products'),$imagename);
            $item->image=$imagename;
        }
        $item->save();
        return back()->withSuccess("product Updated Successfully");
    }
    public function delete($id)
    {
        $item=product::find($id);
        if($item==null)
        return back()->withError("no data in database");
        else{
        $item->delete();
        return back()->withSuccess("product deleted");
        }
    }

    //updating order
    public function goupdate($id,$user)
    {
        $user=Reg::find($user);
        $item= Buy::find($id);
        // dd($user->toarray());
       // dd($item->toarray());
        return view('admin.updateOrder',compact('item','user'));
    }
    public function updateorder(Request $req, $id)
    {
        $req->validate(
            [
                'status'=>'required'
            ]
            );
            $order=Buy::find($id);
            $order->status=$req->status;
            $order->save();
            return back()->withSuccess("Order updated");
    }
    public function goOffer($id)
    {
        $user=Reg::find($id);
        return view('admin.adminOffer',compact('user'));
    }
    public function offer(Request $req)
    {
        $offer = new Offers();
        $offer->offerTitle = $req->offertitle;
        $offer->offerProduct = $req->offerproduct;
        $offer->offerDes = $req->offerdes;
        $offer->save();

        return back()->with('success', 'Offer added successfully');
    }
    public function showoffer($id)
    {
        $user=Reg::find($id);
        $offer= Offers::all();
       return view('admin.adminshowoffer',compact('user','offer'));
    }
    public function updateoffer($id,$user)
    {
        $item= Offers::find($id);
        $user= Reg::find($user);
        return view('admin.updateOffer',compact('item','user'));
    }
    public function updateOfferpost($user, Request $req)
    {
        $req->validate(
            [
                'offertitle'=>'required',
                'offerProduct'=>'required',
                'offerDes'=>'required',
            ]
            );

        $item=Offers::find($user);

        $item->offerTitle=$req->offertitle;
        $item->offerProduct=$req['offerProduct'];
        $item->offerDes=$req['offerDes'];
        $item->save();
        return back()->withSuccess("Offer Updated Successfully");
    }
    public function showDashboard($user_id)
    {
        $user=Reg::find($user_id);
        $product= product::all()->count();
        $order= Buy:: all()->count();
        $customer= Reg::all()->count();
        $totalOrderPrice = Buy::sum('product_price');
        $processingCount = Buy::where('status', 'processing')->count();
        $deliveredCount = Buy::where('status', 'delivered')->count();
        return view ('admin.adminhome',compact('user','product','order','customer','totalOrderPrice','processingCount','deliveredCount'));
    }
}
