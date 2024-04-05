<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reg;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class loginController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.'
        ]);

        $user = Reg::where('email', $req->email)->first();
        if ($user && Hash::check($req->password, $user->password)) {
            // Authentication successful
            Session::put('user', $user);
            if($user->usertype==0){
            if ($req->has('remember')) {
                // Set a "Remember Me" cookie
                $cookie = cookie('remember_token', $user->remember_token, 60 * 24 * 30);
                return view('home.homepage')->withCookie($cookie);
            }
            return view('home.homepage',compact('user'));
        }
        else{
            if ($req->has('remember')) {
                // Set a "Remember Me" cookie
                $cookie = cookie('remember_token', $user->remember_token, 60 * 24 * 30);
                return view('admin.adminhome',compact('user'))->withCookie($cookie);
            }
            return view('admin.adminhome', compact('user'));
        }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function signup(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:regs,email',
            'password' => 'required|min:8',
            'phn' => 'required|numeric',
            'current_address' => 'required',
            'permanent_address' => 'required',
            'city' => 'required'
        ]);

        $user = new Reg;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phn;
        $user->altphn=$req->altphn;
        $user->cur_address = $req->current_address;
        $user->per_address = $req->permanent_address;
        $user->city = $req->city;
        $user->save();
        Session::put('user', $user);
        return view('home.homepage');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('home.index');
    }
    public function showforget()
    {
        return view('forget');
    }
    public function forget(Request $req)
    {
        $user= Reg::where('email',$req->email)->first();

        return view('forgetpasreg',['id'=>$user]);
    }
    public function forgetdone(Request $req, $id)
    {
            $user= Reg::where('id',$id)->first();
            $user->password=Hash::make($req->password);
            $user->save();
            return redirect()->route('home.login');
    }
}
