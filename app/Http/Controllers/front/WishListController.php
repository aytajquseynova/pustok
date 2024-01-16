<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        return view('front.wishList');
    }
    public function addToWishList($id)
    {
        $wishlist = session()->get('wishlist', []);

        if (!in_array($id, $wishlist)) {
            $wishlist[] = $id;
            session(['wishlist' => $wishlist]);
        }

        return redirect()->back()->with('success', 'Added to wishlist');
    }
}


