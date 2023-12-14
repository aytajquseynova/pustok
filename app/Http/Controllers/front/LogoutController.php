<?php
namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
    //    dd();
        Auth::logout();
        return redirect()->route('auth.registration');
    }
}
