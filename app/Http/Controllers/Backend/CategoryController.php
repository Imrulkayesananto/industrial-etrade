<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::latest()->get();
        return view('backend.categories.index', compact('categories'));
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'icon' => 'nullable|max:2000|mimes:png,jpg,webp'
        ]);

        // Store Image
        $fileName =  $request->icon->store('category', 'public');


        $category = Category::create([
            'title' => $request->title,
            'slug' => str()->slug($request->title),
            'icon' => $fileName
        ]);


        if ($category) {
            return back()->with('msg', [
                'res' => 'Category added!'
            ]);
        }
    }


    function delete(Category $category)
    {
        if (Storage::disk('public')->exists($category->icon)) {
            Storage::disk('public')->delete($category->icon);
        }
        $category->delete();


        return back()->with('msg', [
            'res' => 'Category has been deleted'
        ]);
    }
}
