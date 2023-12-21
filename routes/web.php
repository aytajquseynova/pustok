<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\ShopListController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\FaqController;
use App\Http\Controllers\front\LoginController;
use App\Http\Controllers\front\LogOutController;
use App\Http\Controllers\front\RegisterController;
use App\Http\Controllers\front\MyAccountController;
use App\Http\Controllers\front\ProductDetailsController;
use App\Http\Controllers\front\OrderCompleteController;
use App\Http\Controllers\front\WishListController;
use App\Http\Controllers\admin\LanguageLineController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\TranslationLoader\LanguageLine;

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

Route::group(['prefix' => '', 'as' => 'auth.'], function () {

    Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/signin', [LoginController::class, 'index'])->name('signin');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/logout', [LogOutController::class, 'logout'])->name('logout');
});


Route::group(['prefix' => LaravelLocalization::setLocale() . '', 'as' => 'client.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/shopList', [ShopListController::class, 'index'])->name('shopList');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/myaccount', [MyAccountController::class, 'index'])->name('myaccount');
    Route::get('/productDetails', [ProductDetailsController::class, 'index'])->name('productDetails');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::get('/orderComplete', [OrderCompleteController::class, 'index'])->name('orderComplete');
    Route::get('/wishList', [WishListController::class, 'index'])->name('wishList');
});




// Admin group starts
Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/login', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoriesController::class);


    Route::resource('/products', ProductsController::class);
    Route::get('/products/add_images/{id}', [ProductsController::class, 'products_add_image'])->name('products_add_image');
    Route::post('/products/store_images/{id}', [ProductsController::class, 'products_store_image'])->name('products_store_image');
    Route::get('/product_images/{id}', [ProductsController::class, 'product_images'])->name('product_images');
    Route::get('/images/main/{id}/{product_id}', [ProductsController::class, 'add_main_image'])->name('add_main_image');


    Route::prefix('language-line')->controller(LanguageLineController::class)->group(function () {
        Route::get('/', 'index')->name('languageLine.index');
        Route::get('/create', 'create')->name('languageLine.create');
        Route::post('/store', 'store')->name('languageLine.store');
        Route::get('/{languageLine}', 'destroy')->name('languageLine.destroy');
        Route::get('/{languageLine}/edit', 'edit')->name('languageLine.edit');
        Route::put('/{languageLine}', 'update')->name('languageLine.update');
    });
});

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'auth'])->name('auth');
    Route::get('/admin/logout', [AuthController::class, 'auth'])->name('logout');
});

Route::post('/hi', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('sendMail');