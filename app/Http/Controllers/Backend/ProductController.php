<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function index() {}


    function create()
    {
        $categories = Category::where('status', true)->latest()->get();
        return view('backend.products.create', compact('categories'));
    }

    function store(Request $request)
    {

        // $request->validate();


        //* after Validation

        $featurdImage = null;
        $gallImages = [];

        if ($request->hasFile('featured_img')) {
            $featurdImage = $request->featured_img->store('products', 'public');
        }

        if (count($request->gall_img) > 0) {
            foreach ($request->gall_img as $gallImage) {
                $gallImageName = $gallImage->store('products', 'public');
                $gallImages[] = $gallImageName;
            }
        }


        Product::create([
            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'price' => $request->price,
            'selling_price' => $request->selling_price,
            "brand" => $request->brand,
            "sku" => $request->sku,
            "featured_img" => $featurdImage,
            "gall_img" =>  json_encode($gallImages),
            "short_details" => $request->short_details,
            "features" => $request->features,
            "category_id" => $request->category,
        ]);


        return back()->with('msg', [
            'res' => 'Product has been added'
        ]);
    }
}
