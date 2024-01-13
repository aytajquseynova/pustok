<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Products; // Make sure to import the Products model
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add($id)
    {
        $product = Products::find($id);
        if ($product) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'weight' => 50,
                'options' => [
                    'size' => 'large',
                ]
            ]);
               return redirect()->back();
        }

     
    }

        public function destroy()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
}
