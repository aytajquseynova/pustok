<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ShopController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\FaqController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\LogoutController;
use App\Http\Controllers\front\MyAccountController;
use App\Http\Controllers\front\ProductdetailController;
use App\Http\Controllers\front\OrderCompleteController;
use App\Http\Controllers\front\RegisterController;
use App\Http\Controllers\front\WishListController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Remove this route definition:
// Route::get('/login-register', [LoginController::class, 'index'])->name('login-register');

Route::group(['middleware' => 'checkAuth', 'prefix' => '', 'as' => 'auth.'], function () {
    Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
    Route::post('/login-register', [RegisterController::class, 'register'])->name('login-register');
    Route::get('/login-register', [LoginController::class, 'index'])->name('login-register');
    Route::post('/login-register', [LoginController::class, 'login'])->name('login-register');
});


Route::group([ 'middleware'=>'auth',  'prefix'=>'', 'as'=>'front.'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

});

Route::group(['prefix' => LaravelLocalization::setLocale() . '', 'as' => 'client.'], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/myaccount', [MyAccountController::class, 'index'])->name('myaccount');
    Route::get('/product-detail', [ProductdetailController::class, 'index'])->name('product-detail');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/orderComplete', [OrderCompleteController::class, 'index'])->name('orderComplete');
    Route::get('/wishList', [WishListController::class, 'index'])->name('wishList');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'as' => 'admin.'], function(){


});

Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'middleware'=>['auth'], 'as' => 'admin.'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoriesController::class);
    Route::get('/logout', [AuthController::class, 'index'])->name('logout');

    Route::resource('/products', ProductsController::class);
    Route::get('/products/add_images/{id}', [ProductsController::class, 'products_add_image'])->name('products_add_image');
    Route::post('/products/store_images/{id}', [ProductsController::class, 'products_store_image'])->name('products_store_image');
    Route::get('/product_images/{id}', [ProductsController::class, 'product_images'])->name('product_images');


});


Route::middleware(['web','guest'])->controller(AuthController::class)->group(function(){
    Route::get('/admin/login',[AuthController::class,'index'])->name('login');
    Route::post('/admin/login',[AuthController::class,'auth'])->name('auth');

});