<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class NewArrivals extends Controller
{
    public function index(){
        $products = Products::latest()->take(5)->get();

        return view('front.newArrivals', compact('products'));
    }
}
