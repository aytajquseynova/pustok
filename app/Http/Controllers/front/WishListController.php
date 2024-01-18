<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\WishItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{

    public function index($id = null)
    {
        if (auth()->user()) {
            $wishlist = WishItem::all();

            $products = [];
            if ($id !== null) {
                $addedProduct = $wishlist->where('product_id', $id)->first();
                if (!$addedProduct) {
                    $data = [
                        'product_id' => $id,
                        'user_id' => auth()->user()->id,
                    ];

                    $created = WishItem::create($data);

                    if (!$created) {
                        return redirect()->back();
                    }

                    $wishlist->add($created);
                } else {
                    return redirect()->back();
                }
            }

            foreach ($wishlist as $key => $wishitem) {
                $products[] = Products::findOrFail($wishitem->product_id);
            }

            return view('front.wishlist', compact('products'));
        } else {
            return redirect()->route('auth.signin');
        }
    }

    public function remove($id)
    {
        $wishitem = WishItem::where('product_id', $id)->first();
        $deleted = $wishitem->delete();

        if (!$deleted) {
            return redirect()->back()->with('wishlist wasnt deleted');
        } else {
            return redirect()->route('client.wishList')->with('success');
        }
    }
}
