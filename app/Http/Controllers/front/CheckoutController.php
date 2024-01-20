<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\CheckoutRequest;
use App\Models\Checkout;
use App\Models\Products;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('front.checkout', compact('products'));

    }

    public function request(CheckoutRequest $request){
        $created = Checkout::create($request->all());
        dd($created);
        if ($created) {
            return redirect()->route('login.checkout');
        } else {
            dd('error');
        }
    }



}
