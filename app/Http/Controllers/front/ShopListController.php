<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ShopListController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('front.shopList', compact('products'));
    }
}
