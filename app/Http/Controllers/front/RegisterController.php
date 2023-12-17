<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\register\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('front.register');
    }

    public function register(RegisterRequest $request){
        // dd($request->except('_token'));
        $created=User::create($request->all());
        if($created){
            return redirect()->route('auth.register');
        }else{
            dd('error');
        }
    }
}
