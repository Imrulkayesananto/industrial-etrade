<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request)
    {


        if (Cart::where('product_id', $request->product_id)->where('customer_id', auth('customer')->user()->id)->exists()) {
            Cart::where('product_id', $request->product_id)->where('customer_id', auth('customer')->user()->id)->increment('qty', $request->qty);
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'customer_id' => auth('customer')->user()->id
            ]);
        }
        return back();
    }


    public function checkout(){
        $carts = [];
        if(auth('customer')->check()){
            $carts = Cart::with('product')->where('customer_id', auth('customer')?->user()?->id ?? 0)->get();
        }
        return view('frontend.checkout', compact('carts'));
    } 
}
