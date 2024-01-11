<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Colors\Rgb\Channels\Red;

class CurrencyController extends Controller
{
    public function index(Request $request){
        $userIp = $request->ip();
        dd($userIp);
        $response = Http::get('http://jsonplaceholder.typicode.com/posts');

        $jsonData = $response->json();

        dd($jsonData);
    }
}
