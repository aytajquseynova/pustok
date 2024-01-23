<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index()
    {

        return view('front.myaccount');
    }
}
