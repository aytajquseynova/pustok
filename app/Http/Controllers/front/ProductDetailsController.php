<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Images;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
        $product = Products::where('id',$id)->first();


        $category = Category::where('id',$product->category_id)->first();

        $images = [];

        if($product){
           $images[]= $product->main_image;
        }

        $imgs = Images::where('product_id', $product->id)->pluck('img')->toArray();
        if ($imgs) {
            $images = array_merge($images, $imgs);
        }



       $products = Products::orderBy('created_at', 'desc')->take(6)->get();

       $categories = Category::all();
        return view('front.productDetails', compact('product', 'category', 'images', 'products', 'categories'));
    }


    public function show()
    {
        $product = Products::all();

        

        $mostViewedProducts = Products::orderBy('views', 'desc')->take(5)->get();

        return view('front.mostViewedProducts', compact('product', 'mostViewedProducts'));
    }

}
