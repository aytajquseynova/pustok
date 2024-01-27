<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BestSellerController extends Controller
{
    public function index(){
        $products = Products::all();
        $order_products = OrderProduct::where('qty', '>', '1')->with('product')->get();
        return view('front.bestseller', compact('order_products', 'products'));
    }
}
