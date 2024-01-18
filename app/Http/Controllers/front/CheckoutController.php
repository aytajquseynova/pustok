<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('front.checkout', compact('products'));
    }
}
