<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\MainController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;
use App\Models\Products;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        dd($products);
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

}
