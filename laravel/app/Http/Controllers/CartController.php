<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // ---Get /api/carts
    public function getCarts() {
        $carts = Cart::all();
        return response()->json(['carts' => $carts]);
    }
}
