<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index()  {
        $categories = Category::where('status', true)->get();
        return view('frontend.index', compact('categories'));
    }
}
