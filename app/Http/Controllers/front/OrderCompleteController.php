<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderCompleteController extends Controller
{
    public function index()
    {

        $user_id = auth()->user()->id;
        $order_items = Checkout::where('user_id', $user_id)->get();
        $products =Products::all();
        return view('front.orderComplete', compact('products', 'order_items'));


    }
}
