<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Reg;
class adminController extends Controller
{
    public function add($id)
    {
         $user=Reg::where('name',$id)->first();
         return view('admin.adminproduct',compact('user'));
    }
    public function adddata(Request $req,$id)
    {
        $user=Reg::where('name',$id)->first();
        $product= new product;
        $imagename=time().'.'.$req->image->extension();
        $req->image->move(public_path('products'),$imagename);
        $product->name= $req->name;
        $product->details=$req->details;
        $product->price= $req->price;
        $product->discount=$req->dis_price;
        $product->image=$imagename;
        $product->catagory=$req->catagory;
        $product->save();
        return back()->withSuccess("product added sussessfully");
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
}
