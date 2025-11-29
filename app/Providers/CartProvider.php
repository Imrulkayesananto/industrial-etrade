<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class CartProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.frontend', function ($view) {
            $cart = Cart::with('product')->where('customer_id', auth('customer')?->user()?->id ?? 0)->get();
            
            $view->with('carts', [
                'count' => count($cart),
                'data' => $cart,
            ]);
        });
    }
}
