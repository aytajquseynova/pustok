<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add($id)
    {
        Cart::add([
            [
                'id' => 2,
                'name' => 'Product 2',
                'qty' => 1,
                'price' => 9.99,
                'weight' => 50,
                'options' => [
                    'size' => 'large',
                    'image' => '/assets/front/image/products/product-1.jpg'
                ]
            ],
         
        ]);

        return redirect()->back();
    }

}
