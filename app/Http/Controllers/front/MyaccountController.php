<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index()
    {

        $checkouts = Checkout::distinct('user_id')->get();
        return view('front.myaccount', compact('checkouts'));
    }
    
}
