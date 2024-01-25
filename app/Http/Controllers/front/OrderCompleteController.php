<?php
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\checkout\CheckoutRequest;

use App\Models\OrderProduct;
use App\Models\Orders;

class OrderCompleteController extends Controller
{

    // public function index(){

    // }
    public function placeOrder(Request $request)
    {

        $data = $request->all();
        $cartItems = Cart::content();
        $total = Cart::total();
        $data['user_id']=auth()->user()->id;
        $data['total_amount']=$total;

        $order = Orders::create($data);


        foreach ($cartItems as $cartItem) {
            $dataItem = [
                'order_id' => $order->id ,
                'product_id' => $cartItem->id,
                'qty' => $cartItem->qty,
                'price' => $cartItem->price,

            ];
            $createdOrderItem = OrderProduct::create($dataItem);
        }
        // if (!$request->has('accept_terms2')) {
        //     return redirect()->back()->with('error', 'Please accept the terms and conditions.');
        // }

        Cart::destroy();

        return view('front.orderComplete', compact('order', 'cartItems'))->with('success', 'Order placed successfully!');
    }


}
