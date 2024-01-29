<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

            $cartItems = Cart::content();
            $authorArray = [];

            foreach ($cartItems as $item) {
                $author = $item->options->author;

                if (!in_array($author, $authorArray)) {
                    $authorArray[] = $author;
                }
            }

            $products = Products::whereIn('author', $authorArray)
                ->limit(5)
                ->get();

        return view('front.cart' , compact('products'));
    }
}
