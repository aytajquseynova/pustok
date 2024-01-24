<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ShopListController extends Controller
{
public function index(Request $request)
{
    $sortOption = $request->input('sort', 'default');

    $query = Products::query();

    switch ($sortOption) {
        case 'a-z':
            $query->orderBy('title', 'asc');
            break;
        case 'z-a':
            $query->orderBy('title', 'desc');
            break;
        case 'low-high':
            $query->orderByRaw('(price - (price * percent / 100)) ASC');
            break;
        case 'high-low':
            $query->orderByRaw('(price - (price * percent / 100)) DESC');
            break;
        default:
            
            break;
    }

    $products = $query->get();
    $categories = Category::all();

    return view('front.shopList', compact('products', 'categories', 'sortOption'));
}


}
