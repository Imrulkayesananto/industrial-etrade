<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/shop', [ShopController::class,'shop'])->name('frontend.shop');

Route::post('/add-to-cart', [CartController::class,'addToCart'])->name('frontend.addToCart');


Route::get('/product/{product:slug}', [HomeController::class,'viewProduct'])->name('frontend.product.view');


Auth::routes();
