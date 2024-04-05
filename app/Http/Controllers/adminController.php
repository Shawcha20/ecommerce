<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class adminController extends Controller
{
    public function add()
    {
        return view('admin.adminproduct');
    }
}
