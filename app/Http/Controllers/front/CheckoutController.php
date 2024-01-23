<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\CheckoutRequest;
use App\Models\Checkout;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $order_items = Checkout::where('user_id', $user_id)->get();
        
        // Assuming you need all products for some purpose
        $products = Products::all();
        return view('front.checkout', compact('products', 'order_items'));
    }

    public function request(CheckoutRequest $request)
    {

    $user_id = auth()->user()->id;
    $request->merge(['user_id' => $user_id]);

    $created = Checkout::create($request->all());

    if ($created) {
        return redirect()->route('client.orderComplete');
    } else {
        dd('error');
    }

    }
}

