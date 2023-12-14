<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
   
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
       $credentials['is_admin'] = 1;

       if (Auth::attempt($credentials, $remember)){

           return redirect()->intended('dashboard');
       }

       return back()->with(['error' => 'you are not admin ay bro.']);
       
    }
}