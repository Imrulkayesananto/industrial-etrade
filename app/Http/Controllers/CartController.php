<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request) {
            dd(request()->ip());

    }
}
