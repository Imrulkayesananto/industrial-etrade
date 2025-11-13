<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;


Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::controller(CategoryController::class)->prefix('/categories')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{category}', 'delete')->name('delete');
    });
});