<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
{
    // Tüm ürünleri al

     $selectedProducts = Products::where('percent', '<', 40)->paginate(12);

    // Kategorileri al
    $categories = Category::all();

    // İlgili görünüme verileri gönder
    return view('front.sale-four', compact('selectedProducts', 'categories'));
}


}
