<?php

namespace App\Http\Controllers\front;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\register\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front.register');
    }

    public function register(RegisterRequest $request)
    {

        $created = User::create($request->all());

        if ($created) {
            return redirect()->route('auth.signin');
        } else {
            dd('error');
        }
    }
}
