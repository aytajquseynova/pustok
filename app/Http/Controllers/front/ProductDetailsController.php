<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Category::all();
        return view('front.productDetails', compact('products', 'categories'));
    }
}
