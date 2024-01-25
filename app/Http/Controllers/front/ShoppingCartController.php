<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function add($id)
    {
        if (!auth()->check()) {
            return redirect()->route('auth.signin')->with('error', 'Please sign in to add products to the cart.');
        }

        $product = Products::find($id);

        if ($product) {
            $discountedPrice = $product->price - ($product->price * $product->percent / 100);

            Cart::add([
                'id' => $product->id,
                'name' => $product->title,

                'qty' => 1,
                'price' => $discountedPrice,
                'weight' => 50,
                'options' => [
                    'size' => 'large',
                    'image' => $product->main_image,
                    'author' => $product->author,
                    'percent' => $product->percent,
                    'user_id' => $product -> user_id,
                ]
            ]);
        }

        return redirect()->back();
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

