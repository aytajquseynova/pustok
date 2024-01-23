<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\WishItem;
use Illuminate\Http\Request;

class WishListController extends Controller
{
  public function index($id = null)
{
    if (auth()->user()) {
        // Load wish items for the authenticated user
        $user_id = auth()->user()->id ;
        $wishlist = WishItem::where('user_id', $user_id)->get();

        $products = [];

        if ($id !== null) {
            $addedProduct = $wishlist->where('product_id', $id)->first();

            if (!$addedProduct) {
                $data = [
                    'product_id' => $id,
                    'user_id'=> $user_id,
                ];

                // Use the relationship to create a new wish item
                $created = WishItem::create($data);


                if (!$created) {
                    return redirect()->back();
                }else{
                    $wishlist->add($created);
                }
            } else {
                return redirect()->back();
            }
        }

        // Load products based on wish items
        foreach ($wishlist as $key => $wishitem) {
            $product = Products::where('id', $wishitem->product_id)->first();
            if ($product) {
                        $products[] = $product;
            }else{
                $wishitem->delete();
            }

        }


        return view('front.wishlist', compact('products'));
    } else {
        return redirect()->route('auth.signin')->with('error', 'Please sign in to add products to the wishlist.');
    }
}
 public function remove($id)
    {
        // Find the wish item with the given product_id for the authenticated user
        $wishitem = WishItem::where('product_id', $id)->first();

        if ($wishitem) {
            // Delete the wish item
            $wishitem->delete();

        // $user_id = auth()->user()->id ;
        // $wishlist = WishItem::where('user_id', $user_id)->get();
            return redirect()->route('client.wishList')->with('success', 'Item removed from wishlist');
        } else {
            return redirect()->back()->with('error', 'Wishlist item not found');
        }
    }
}
