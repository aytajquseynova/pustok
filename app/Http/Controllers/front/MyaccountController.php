<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\OrderProduct;
use App\Models\Orders;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function index(Request $request)
    {
       $order_products = OrderProduct::where('user_id', auth()->user()->id)->with('order', 'product')->get();
        $products = Products::all();

        return view('front.myaccount', compact('order_products', 'products'));

    }

}
