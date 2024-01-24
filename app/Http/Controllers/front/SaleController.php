<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $sortOption = $request->input('sort', 'default');

        $selectedProductsQuery = Products::where('percent', '<', 40);

        switch ($sortOption) {
            case 'a-z':
                $selectedProductsQuery->orderBy('title', 'asc');
                break;
            case 'z-a':
                $selectedProductsQuery->orderBy('title', 'desc');
                break;
            case 'low-high':
                $selectedProductsQuery->orderByRaw('(price - (price * percent / 100)) ASC');
                break;
            case 'high-low':
                $selectedProductsQuery->orderByRaw('(price - (price * percent / 100)) DESC');
                break;
            default:

                break;
        }

        $selectedProducts = $selectedProductsQuery->paginate(12);
        $categories = Category::all();

        return view('front.sale-four', compact('selectedProducts', 'categories'));
    }
}
