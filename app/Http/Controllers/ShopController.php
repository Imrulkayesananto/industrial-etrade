<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    

    function shop(Request $request)
    {


        $products = Product::query();

        if (isset($request->category)) {
            $products->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products  = $products->where('status', true)->paginate(20);



        $categories = Category::where('status', true)->select('id', 'title', 'slug')->get();
        return view('frontend.shop', compact('products', 'categories'));
    }
}
