<?php

use App\Http\Controllers\admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\API\CategoriesController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('products', ProductsController::class);
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{$id}', [ProductController::class, 'show']);
    Route::get('categories', [CategoriesController::class, 'index']);
});