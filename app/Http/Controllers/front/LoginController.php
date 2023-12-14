<?php


namespace App\Http\Controllers\front;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.login-register');
    }

    public function login(Request $request)
    {
        // Get email and password from the request
        $credentials = $request->only('email', 'password');

        // Check if the 'remember' checkbox is checked
        $remember = $request->has('remember');

        // Attempt to authenticate the user using the provided credentials
        if (Auth::attempt($credentials, $remember)) {
            // If authentication is successful, redirect the user to the home page
            return redirect()->route('client.home');
        } else {
            // If authentication fails, redirect back with an error message
            return back()->with('error', 'Login or email is invalid');
        }
    }
}
