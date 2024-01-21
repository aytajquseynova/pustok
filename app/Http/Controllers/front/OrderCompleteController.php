<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderCompleteController extends Controller
{
    public function index()
    {

        $products =Products::all();
        return view('front.orderComplete', compact('products'));
    }
}
