<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    function index()  {
        $categories = Category::where('status', true)->get();
        $products = Product::where('status', true)->latest()->take(8)->get();
        return view('frontend.index', compact('categories','products'));
    }


    function viewProduct(Product $product) {

        return view('frontend.singleProduct', compact('product'));
        
    }
}
