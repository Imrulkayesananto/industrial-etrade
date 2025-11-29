<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\SslCommerzPaymentController;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/shop', [ShopController::class, 'shop'])->name('frontend.shop');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('frontend.addToCart')->middleware('customer');
Route::get('/checkout', [CartController::class, 'checkout'])->name('frontend.checkout');


//* Customer Auth
Route::get('/sign-in', [CustomerAuthController::class, 'showLoginForm'])->name('frontend.customer.login');
Route::post('/sign-in', [CustomerAuthController::class, 'login'])->name('frontend.customer.login.confirm');
Route::get('/sign-up', [CustomerAuthController::class, 'showRegisterForm'])->name('frontend.customer.register');
Route::post('/sign-up', [CustomerAuthController::class, 'register'])->name('frontend.customer.register.confirm');
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('frontend.customer.logout');
Route::get('/my-profile', [CustomerAuthController::class, 'myProfile'])->name('frontend.customer.profile')->middleware('customer');


Route::get('/product/{product:slug}', [HomeController::class, 'viewProduct'])->name('frontend.product.view');


Auth::routes();




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END